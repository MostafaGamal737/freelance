<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Custom style-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!--Page title-->
    <!--font family import-->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap')}}" rel="stylesheet">

    <title>الرسائل</title>
</head>
<body>

<!--navbar-->
<nav class="navbar navbar-dark navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="{{asset('Logout')}}">تسجيل الخروج</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="{{asset('Home')}}">الصفحه الرئيسيه</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href='{{asset('Home/Orders')}}'>المعاملات</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href='{{asset('Home/chats')}}'>الرسائل</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          الاشعارات
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
@if (count(Auth::user()->Notifications)>0)
    @foreach (Auth::user()->Notifications as $notification)
            <a class="dropdown-item" href="{{asset('Home/Orders/OrdersDetails')}}/{{$notification->data['id']}}">{{$notification->data['message']}}  <strong class="font-weight-bold">{{$notification->data['name']}} كود العرض {{$notification->data['code']}}</strong></a>

          @endforeach
@endif
          </div>
        </li>

      </ul>
    </div>
    <a class="navbar-brand" href="#" id="logo">
      <img src="{{asset('images/logotext.svg')}}" width="60" height="45" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
  </nav>


    <div class="container" id='app'>
   <chat :user="{{Auth::user()}}" :chat="{{$chat}}"  ></chat>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript">

    </script>
</body>

</html>
