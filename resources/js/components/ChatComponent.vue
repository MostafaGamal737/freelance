<template>
  <div class="row justify-content-center">

    <div class="col-md-6">
      <div class="card-header">
        <div class="card-body p-0">
          <ul class="list-unstyled" style="height:300px;overflow:scroll">
            <li class="p-2" v-for='message in messages'>
              <strong>{{message.user.name}}</strong>
              {{message.message}}
            </li>
          </ul>
        </div>

        <input type="text" name="message" class="form-control"autocomplete="off"
        v-model="newmessage"
        @keyup.enter="sendmessages"
        placeholder="write message here......">
        <span class="text-muted">user is typing</span>
      </div>
    </div>
    <div class="col-2">
      <div class="card card-default">
        <div class="card-header">active user</div>
        <div class="card-body">
          <ul>
            <li class="py-2">jarsh</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:['user'],
    data()
    {
      return{
        messages:[],
        newmessage:'',
      }

    },
    created(){
      this.getmessages();

      Echo.join('chat')
      .listen('sendMessageEvent',(e)=>{
        this.messages.push(e.message)
      });
    },

    methods:{
      getmessages(){
        axios.get('messages').then(response=>{
          this.messages=response.data;
        });
      },
      sendmessages(){
        this.messages.push({
          user:this.user,
          massege:this.newmessage
        });
        axios({
          method: 'post',
          url: '/messages',
          data: {
            messege:this.newmessage,

          }
        }).then(function (response) {
        console.log(response.data);
        });
        this.newmessage="";

      },

    },
  }
</script>
