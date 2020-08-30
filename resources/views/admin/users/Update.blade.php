

@extends('includes.master')
@section('title')
  تعديل بيانات المستخدم
@endsection
@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form class="form-horizontal" action="{{asset('Dashboard/Users/Update')}}/{{$user->id}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" >اسم  </label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخل اسم   " autocomplete="off"name="name" value="{{$user->name}}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >جوال  </label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخلي رقم  " autocomplete="off" name="phone" value="{{$user->phone}}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >كلمة سر  </label>
        <div class="col-sm-10">
          <input type="password" class="form-control"  placeholder="Enter Passowrd " name="password" autocomplete="off"></input>
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
           @foreach (App\role::get() as $role)
             <option value="{{$role->role}}"{{($user->role==$role->role)?'selected':""}}>{{$role->role}}</option>
           @endforeach

          </select>
        </div>
      </div>
      <div class="col-lg-4">

        <label class="control-label col-lg-2" >البلد</label>
        <div class="col-lg-2">
          <select class="" name="location">

            <option selected value="السعوديه">السعوديه</option>
          </select>
        </div>
      </div>
      </div>
<br>
  <button type="submit" class="btn btn-primary">تحديث البيانات</button>
    </div>

    @foreach($errors->all() as $error)
      <h7 class="alert alert-danger">  {{$error}}</h7>
    @endforeach
  </form>
</div>
</div>
@endsection
