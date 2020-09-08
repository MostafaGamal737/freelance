<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Custom style-->
    <link rel="stylesheet" href="css/style.css">
    <!--Page title-->
    <!--font family import-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <title>تسجيل جديد</title>
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
                    <a class="nav-link" href="{{asset('Login')}}">تسجيل الدخول</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled">تسجيل جديد</a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand" href="#" id="logo">
            <img src="images/logotext.svg" width="60" height="45" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
    </nav>
  <div class="container">

     <!--login card-->
  
     @if(session()->has('message'))
     @include('includes.erorrs')
     @endif
     <div class="form-group">
     @if(session()->has('success_message'))
     @include('includes.success')
     @endif
     <div class="card" id="registration-card">
         <div class="card-body">
           <form class="" action="{{asset('Register')}}" method="post">
             {{csrf_field()}}

             <div class="row d-flex justify-content-center">
                 <h5 class="card-title header-text">تسجيل جديد</h5>
             </div>
             <div class="row d-flex justify-content-center">
                 <input name='name' class="form-control" type="text" placeholder="الاسم بالكامل">
                 @if (($errors->has('name')))
                    <small class="text-danger" >{{$errors->first('name')}}</small>
                 @endif

             </div>
             <div class="row d-flex justify-content-center">
                 <input name='email' class="form-control" type="email" placeholder="البريد الالكتروني">
                 @if (($errors->has('email')))
                    <small class="text-danger" >{{$errors->first('email')}}</small>
                 @endif
             </div>
             <div class="row d-flex justify-content-center">
                 <input name='phone' class="form-control" type="phone" placeholder="رقم الجوال">
                 @if (($errors->has('phone')))
                    <small class="text-danger" >{{$errors->first('phone')}}</small>
                 @endif
             </div>
             <div class="row d-flex justify-content-center">
                 <input class="form-control" type="password" placeholder="كلمه المرور" name='password'>
                 @if (($errors->has('password')))
                    <small class="text-danger" >{{$errors->first('password')}}</small>
                 @endif
             </div>

             <div class="row d-flex justify-content-center">
                 <select class="form-control" id="exampleFormControlSelect1">
                     <option selected disabled>الدوله</option>
                     <option>السعوديه</option>
                  </select>
             </div>
             <div class="row d-flex justify-content-center">
                 <button type="submit" class="btn btn-success " id="btn-submit">متابعه</button>
             </div>

           </form>
         </div>
     </div>
 </div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </body>

 </html>
