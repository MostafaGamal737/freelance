@extends('includes.master')
@section('title')
  المستخدمين
@endsection
@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
    <a href="{{asset('Dashboard/Users/AddUser')}}" class="btn btn-primary"hidden>اضف جديد</a>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
  <div class="">
     <form class="form" action="{{asset('search/user')}}" method="post">
       <div class="form-group">
@csrf
       <input required class="form-control col-lg-2" type="text" name="search" value="" placeholder="بحث" style="text-align:right;">
       <input class="btn btn-primary form-control col-lg-2" type="submit" name="" value="بحث">
     </div>
     </form>
  </div>
      </form>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>الجوال</th>
            <th>الوظيفه</th>
            <th>البلد</th>
            <th >الفعل</th>
            <th >مدير</th>
          </tr>
        </thead>
        <tbody>

    @foreach ($users as $user)

          <tr class="table">
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
          <td id='role'>{{$user->role}}</td>
          <td>{{$user->location}}</td>
            <td ><a href="{{asset('Dashboard\Users')}}\{{$user->id}}" class="btn btn-primary">مشاهدة</a>
            @if(Auth::user()->role=='مدير عام')
            <a hidden href="{{asset('Dashboard\Users\Update')}}\{{$user->id}}" class="btn btn-info">تعديل</a>
            <a  href="{{asset('Dashboard/Users/DeleteUser')}}/{{$user->id}}" class="btn btn-danger"onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');">حذف</a>

            </td>
            <td><input name='{{$user->id}}' type="checkbox"    {{($user->role=='مدير')?'checked':''}} ></td>
            @endif

            </tr>
    @endforeach
   
     <tr> <td class="center">{{ $users->links() }}</td></tr>
   
@csrf
          </tbody>
        </table>
      </div>
    </div>

  @endsection
  @section('jsSection')
  <script>
     $('table td input[type=checkbox]' ).click(function() {
  var  id = (this.name) ; // button ID
  if(confirm('هل انتا متأكد !!')==true){
     $.ajax({

                    /* the route pointing to the post function */
                    url: '/Dashboard/Users/Update/admin/'+id,
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: '{{csrf_token()}}','id':id,'admin':this.checked},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      console.log('data');
                      location.reload(true);
                    },
                    error:function(x,e) {
                      location.reload(true);
                    }

                    
                });
              }
              else{
                if(this.checked==true){
                  this.checked=false;
                }
                else{
                  this.checked=true;
                }
  
} 
});


    </script>
    @endsection
