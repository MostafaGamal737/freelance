<!DOCTYPE <!DOCTYPE html>
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
    <title>استعاده كلمه المرور</title>
</head>

<body>
    <!--navbar-->
    <!--navbar-->
    <nav class="navbar navbar-dark navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link disabled">تسجيل الدخول</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.html">تسجيل جديد</a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand" href="#" id="logo">
            <img src="images/logotext.svg" width="60" height="45" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
    </nav>

  <div class="container">
    <h2><span id="f"> ادخل كلمة السر الجديده</span></h2>
    <form class="form-horizontal" action="{{asset('ResetNewPassord')}}" method="post">
      {{csrf_field()}}
    
      <div class="card" id="login-card">
            <div class="card-body">

                <div class="row d-flex justify-content-center">
                    <h5 class="card-title header-text">تعيين كلمه مرور جديده</h5>
                </div>
                <div class="row d-flex justify-content-center">
                    <input name="password" class="form-control" type="password" placeholder="كلمه المرور الجديده">
                      <input type="hidden" class="form-control"   value="{{$token}}" name="token" autocomplete="off">
                     <input type="hidden" class="form-control"  value="{{$email}}" name="email" autocomplete="off">
                </div>
                 <div class="row d-flex justify-content-center">
                   <input name="password_confirmation" class="form-control" type="password" placeholder="تأكيد كلمه المرور الجديده">
                </div>

                <div class="row d-flex justify-content-center" id="send-request-btn">
                    <button type="submit" class="btn btn-success" id="btn-submit">تأكيد</button>
                </div>

            </div>
        </div>
    </div>

    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>
