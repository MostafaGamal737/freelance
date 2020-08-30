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
                    <a class="nav-link" href="Login">تسجيل الدخول</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="Registr">تسجيل جديد</a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand" href="#" id="logo">
            <img src="images/logotext.svg" width="60" height="45" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
    </nav>
  <div class="container">
    <h2><span id="f">هل نسيت كلمة المرور؟</span></h2>
    <form class="form-horizontal" action="ResetPassord" method="post">
      {{csrf_field()}}
      @if(session()->has('message'))
      @include('includes.erorrs')
      @endif

         <!--login card-->
         <div class="card" id="forget-password-card">
             <div class="card-body">
                 <div class="row d-flex justify-content-center">
                     <h5 class="card-title header-text">هل نسيت كلمه المرور ؟</h5>
                 </div>
                 <div class="row d-flex justify-content-center">
                     <input name="email" class="form-control" type="email" placeholder="ادخل بريدك الالكتروني ">
                 </div>

                 <div class="row d-flex justify-content-center" id="send-request-btn">
                     <button type="submit" class="btn btn-success" id="btn-submit">متابعه</button>
                 </div>

             </div>
         </div>
     </div>

    </form>
  </div>
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   </body>

   </html>
