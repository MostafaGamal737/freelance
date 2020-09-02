<!--navbar-->
@php
  if (count(Auth::user()->Notifications)>0) {
    $notifications=Auth::user()->Notifications()->orderBy('id','desc')->take(7)->get();
    $count=Auth::user()->unreadNotifications()->get()->count();
  }
@endphp
<nav class="navbar navbar-dark navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" id="notification">
      <li class="nav-item ">
        <a class="nav-link" href="{{asset('Logout')}}">تسجيل الخروج</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="{{asset('Home')}}">الصفحه الرئيسيه</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href='{{asset('Home/Orders')}}'>المعاملات</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href='{{asset('Home/chats')}}'>الرسائل</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          الاشعارات <small class="text-primary"><strong>{{($count)}}</strong></small>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($notifications as $notification)
             <a class="dropdown-item" href="{{asset('Home/Orders/OrdersDetails')}}/{{$notification->data['id']}}">{{$notification->data['message']}}  <strong class="font-weight-bold">{{$notification->data['name']}} كود العرض {{$notification->data['code']}}</strong></a>

          @endforeach

          </div>
        </li>

      </ul>
    </div>
    <a class="navbar-brand" href="#" id="logo">
      <img src="{{asset('images/logotext.svg')}}" width="60" height="45" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
  </nav>
