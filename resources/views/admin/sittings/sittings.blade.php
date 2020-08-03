

@extends('includes.master')

@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
      @if(count($errors->all()))
        <h5 class="alert alert-danger" >جميع الحقول يجب ان تملئ</h5>
      @endif
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
          <input type="text" class="form-control"  placeholder="ادخل رقم الجوال الخاص بالموقع " autocomplete="off" name="phone"value="@if ($sitting){{$sitting->phone}}
          @endif">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" > الايمال</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخيل ايميال الخاص بالموقع " autocomplete="off" name="email"value="@if ($sitting){{$sitting->email}}
         @endif">
      </div>
        </div>
      <div class="form-group">
        <label class="control-label col-sm-2" > رقم الحساب</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="ادخل رقم الحساب البنكي " autocomplete="off" name="card_number"value="@if ($sitting){{$sitting->card_number}}
         @endif">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >شرح مفصل</label>
        <div class="col-sm-10">
          <textarea  class="form-control"  placeholder="اكتب شرح مفصل عن طبيعة الموقع " name="description" autocomplete="off">@if ($sitting) {{$sitting->description}}@endif</textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >الشروط</label>
        <div class="col-sm-10">
          <textarea  class="form-control"  placeholder="الشروط" name="terms" autocomplete="off">@if ($sitting) {{$sitting->terms}}@endif</textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4" hidden>

        <label class="control-label col-lg-2" >لوجو</label>
        <div class="col-lg-2">
          <input type="file"name="image" value="@if ($sitting)
             {{$sitting->image}}
           @endif">
        </div>
      </div>

      </div>
<br>
  <button type="submit" class="btn btn-primary">اضف الاعدادات</button>
    </div>
  </form>
</div>
</div>
@endsection
