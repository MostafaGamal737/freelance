<!DOCTYPE html>
<html lang="ar">
@php
 $Sittings=App\sitting::first();
@endphp
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Custom style-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--Page title-->
    <!--font family import-->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap')}}" rel="stylesheet">
    @yield('css')
    <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: green;
   color: white;
   text-align: right;
}
</style>
    <title>@yield('title')</title>
</head>
<body>

@include('users.layout.nav')
 @yield('body')

 <div class="footer">
  <p>رقم الجوال الخاص بنا:{{$Sittings->phone}}</p>
  <p>{{$Sittings->email}}:البريد الالكتروني</p>
</div>

   <script src="{{asset('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js')}}" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
   $("#notification").click(function(){

     $.get("/user/notifications", function(data){
        console.log(data);
   });
   });
   </script>
@yield('js')
</body>

</html>
