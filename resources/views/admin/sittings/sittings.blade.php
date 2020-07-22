

@extends('includes.master')

@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form class="form-horizontal" action="{{asset('Dashboard/Sittings/AddSittings')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group">
        <label class="control-label col-sm-2" > رقم الجوال</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخل رقم الجوال الخاص بالموقع " autocomplete="off" name="phone">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" > الايمال</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخيل ايميال الخاص بالموقع " autocomplete="off" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" > رقم الحساب</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخل رقم الحساب البنكي " autocomplete="off" name="card_number">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >شرح مفصل</label>
        <div class="col-sm-10">
          <textarea  class="form-control"  placeholder="اكتب شرح مفصل عن طبيعة الموقع " name="description" autocomplete="off"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >الشروط</label>
        <div class="col-sm-10">
          <textarea  class="form-control"  placeholder="الشروط" name="terms" autocomplete="off"></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">

        <label class="control-label col-lg-2" >لوجو</label>
        <div class="col-lg-2">
          <input type="file"name="image">
        </div>
      </div>

      </div>
<br>
  <button type="submit" class="btn btn-primary">اضف الاعدادات</button>
    </div>

    @foreach($errors->all() as $error)
      <h3 class="alert alert-danger">  error: {{$error}}</h3>
    @endforeach
  </form>
</div>
</div>
@endsection
