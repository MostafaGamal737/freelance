<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style >

    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body >

  <div class="container">
    <h2><span id="f"> ادخل كلمة السر الجديده</span></h2>
    <form class="form-horizontal" action="{{asset('ResetNewPassord')}}" method="post">
      {{csrf_field()}}
      @foreach($errors->all() as $error)
        <h5 class="alert alert-danger" >{{$error}}</h5>
      @endforeach
      @if(session()->has('message'))
      @include('includes.erorrs')
      @endif
      <div class="form-group">
      @if(session()->has('success_message'))
      @include('includes.success')
      @endif

      <div class="form-group">
        <label class="control-label col-sm-2" ><span id="f">كلمة السر</span></label>
        <div class="col-sm-10">
          <input type="password" class="form-control"   name="password" autocomplete="off">
          <input type="hidden" class="form-control"   value="{{$token}}" name="token" autocomplete="off">
          <input type="hidden" class="form-control"  value="{{$email}}" name="email" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" ><span id="f">تأكيد كلمة السر</span></label>
        <div class="col-sm-10">
          <input type="password" class="form-control"   name="password_confirmation" autocomplete="off">
        </div>
      </div>

      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">تأكيد</button>
          </div>
      </div>

    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>
