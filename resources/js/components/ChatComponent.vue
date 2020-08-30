<template>
    <div class="messaging">
        <div class="inbox_msg">

            <div class="mesgs">
                <div class="msg_history" v-for='message in messages'>
                    <div class="incoming_msg" v-if='user.id!=message.user_id'>
                        <div class="incoming_msg_img"> <img src="/images/Avatar.png" alt="avatar"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>{{message.message}}</p>
                                <span class="time_date">{{message.created_at}}</span></div>
                        </div>
                    </div>
                    <div class="outgoing_msg" v-if='user.id==message.user_id'>
                        <div class="sent_msg">
                            <p>{{message.message}}</p>
                            <span class="time_date"> {{message.created_at}}</span> </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                    <div class="container">
                    <div class="row">
                    <div class="col-sm">
                        <input name="message" type="text"  placeholder="اكتب رسالتك" autocomplete="off"
                        @keydown="typing"
                        v-model="newmessage"
                        @keyup.enter="sendmessages"
                        />

                    </div>

                    <div class="col-sm-2 ml-1">
                        <button type="button" class="btn btn-primary msg_send_btn">ارسل</button>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>الاعضاء</h4>
                    </div>

                    <div class="chat_list">
                        <div class="chat_people" v-for='user in users' >
                            <div class="chat_img"> <img src="/images/Avatar.png" alt="avatar"> </div>
                            <div class="chat_ib">
                                <h5 class="text-right">{{user.name}} <span class="chat_date">متاح</span></h5>
                                <p class="text-right"><span class="text-muted" v-if='activeUSer==user.name'>يكتب الان..</span></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </template>

  <script>
  export default {
    props:['user','chat'],


    data()
    {
      return{
        messages:[],
        newmessage:'',
        users:[],
        username:'',
        activeUSer:false,
        seen:false,
        time:'',
      }

    },
    created(){
      this.getmessages();

      Echo.join('Chat.'+this.chat.id)
      .here(user=>{
        this.users=user;

        this.time = String(new Date().getHours()-12)+':'+String(new Date().getMinutes());
      })
      .leaving(user=>{
        this.users=this.users.filter(u=>u.id !=user.id);
      })
      .joining(user=>{
        this.users.push(user);
          this.seen=true;
      })
      .listen('SendMessageEvent',(e)=>{
        this.messages.push(e.message);

      })
      .listenForWhisper('typing', (e) => {
        if (e.message!='') {
          this.activeUSer=e.name;
        }
        else {
          this.activeUSer=null;
        }

      });

    },

    methods:{
      getmessages(){

        axios.get('/Home/chats/'+this.chat.id+'/messages').then(response=>{
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
          url: '/sendmessage',
          data: {
            message:this.newmessage,
            chat_id:this.chat.id,

          }
        }).then(function (response) {
        console.log(response.data);
        });
        this.newmessage="";

      },
      typing(){
        Echo.join('Chat.'+this.chat.id)
          .whisper('typing',{
            name:this.user.name,
            message:this.newmessage,
          });
      }
    },
  }
  </script>
