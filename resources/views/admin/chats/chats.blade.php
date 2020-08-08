@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th>اسم المحادثه</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($chats as $chat)

            <tr class="table">
              <td>{{$chat->id}}</td>
              <td>{{App\user::find($chat->sender_id)->name}}</td>
              <td>{{App\user::find($chat->receiver_id)->name}}</td>
              <td>{{$chat->chat}}</td>
              <td ><a href="{{asset('Dashboard\Chats\Chat')}}\{{$chat->id}}" class="btn btn-primary">مشاهدة</a><a href="DeleteUser/" class="btn btn-danger">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
