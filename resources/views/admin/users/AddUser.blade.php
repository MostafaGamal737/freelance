

@extends('includes.master')
@section('title')
  اضف مدير
@endsection
@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form class="form-horizontal" action="{{asset('Dashboard/Users/AddUser')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" >اسم المدير</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخل اسم المدير " autocomplete="off"name="name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >جوال المدير</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخلي رقم المدير" autocomplete="off" name="phone">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >اميل المدير</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخير اميل لمدير " autocomplete="off" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >كلمة سر المدير</label>
        <div class="col-sm-10">
          <input type="password" class="form-control"  placeholder="Enter Passowrd " name="password" autocomplete="off"></input>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >تأكيرد كلمة السر</label>
        <div class="col-sm-10">
          <input type="password" class="form-control"  placeholder="تأكيد كلمة السر " name="password_confirmation" autocomplete="off"></input>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4" hidden>

        <label class="control-label col-lg-2" >صورة الغلاف</label>
        <div class="col-lg-2">
          <input type="file"name="image">
        </div>
      </div>
      <div class="col-lg-4">

        <label class="control-label col-lg-2" >الوظيفه</label>
        <div class="col-lg-2">
          <select class="" name="role">

            <option value="مدير">مدير</option>
          </select>
        </div>
      </div>
      <div class="col-lg-4">

        <label class="control-label col-lg-2" >البلد</label>
        <div class="col-lg-2">
          <select class="" name="location">

            <option value="السعوديه">السعوديه</option>
          </select>
        </div>
      </div>
      </div>
<br>
  <button type="submit" class="btn btn-primary">اضف مدير</button>
    </div>

    @foreach($errors->all() as $error)
      <h3 class="alert alert-danger">  {{$error}}</h3>
    @endforeach
  </form>
</div>
</div>
@endsection
