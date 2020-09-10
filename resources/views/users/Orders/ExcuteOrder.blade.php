@extends('users.layout.master')
@section('title')
تفاصيل المعامله
@endsection
@section('body')


  <div class="image-container">
              <img src="{{asset('images/wfh.png')}}" style="width:100%" class="img-fluid" alt="Responsive image">
          <h1 class="centered">قم بتقديم طلب تنفيذ خدمه</h1>
          </div>
          @if(session()->has('error'))
            <div class="row d-flex justify-content-center alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
          <!--login card-->
          <div class="card" id="registration-card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <h5 class="card-title header-text">تقديم طلب</h5>
                  </div>
                  <form class="" action="{{asset('Home/ExcuteOrder')}}" method="post">
                  @csrf

                  <div class="row d-flex justify-content-center">
                      <input name="provider_phone" class="form-control" type="phone" placeholder="رقم الجوال الخاص بك" required oninvalid="this.setCustomValidity('ادخل رقم الجوال الخاص بك')"
                      oninput="setCustomValidity('')">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="client_phone" class="form-control" type="phone" placeholder="رقم الجوال الخاص بطالب الخدمه"required oninvalid="this.setCustomValidity('ادخل رقم الجوال الخاص بطالب الخدمه')"
                      oninput="setCustomValidity('')">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="code" class="form-control" type="text" placeholder="الكود"required oninvalid="this.setCustomValidity('ادخل الكود الخاص بالخدمه المطلوبه')"
                      oninput="setCustomValidity('')">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="account_number" class="form-control" type="text" placeholder="رقم الحساب"required oninvalid="this.setCustomValidity('ادخل رقم الحساب الخاص بك')"
                      oninput="setCustomValidity('')">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="IBAN" class="form-control" type="text" placeholder="IBAN"required oninvalid="this.setCustomValidity('ادخل ال IBAN الخاص بك')"
                      oninput="setCustomValidity('')">
                  </div>

                  <div class="row" id="check-row">
                      <div class="form-check">
                          <label class="form-check-label" for="defaultCheck1">
                              موافق علي الشروط و الاحكام
                              </label>
                          <input required class="form-check-input" type="checkbox" value="" id="defaultCheck1" oninvalid="this.setCustomValidity('اوافق علي الشروط')"
                          oninput="setCustomValidity('')">
                      </div>
                  </div>

                  <div class="row d-flex justify-content-center" id="send-request-btn">
                      <button type="submit" class="btn btn-success" id="btn-submit">متابعه</button>
                  </div>
  </form>
              </div>
          </div>
      </div>
@endsection
