@extends('users.layout.master')
@section('title')
طلب جديد
@endsection
@section('body')

  <div class="container-fluid">
      <div class="image-container">
          <img src="images/wfh.png" class="img-fluid" alt="Responsive image">
          <h1 class="centered">معامله جديده</h1>
      </div>

      <!--login card-->
      <div class="card" id="request-card">
          <div class="card-body">
              <div class="row d-flex justify-content-center">
                  <h5 class="card-title header-text">تقديم طلب</h5>
              </div>
              <p class="text-right">بيانات طالب الخدمه</p>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="الاسم بالكامل">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="phone" placeholder="رقم الجوال">
              </div>
              <p class="text-right">بيانات منفذ الخدمه</p>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="الاسم بالكامل">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="phone" placeholder="رقم الجوال">
              </div>
              <p class="text-right">تفاصيل الخدمه</p>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="نوع الخدمه">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="مده الاتفاق">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="المبلغ المتفق عليه">
              </div>
              <div class="row d-flex justify-content-center">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="وصف الخدمه"></textarea>
              </div>
              <div class="row" id="check-row">
                  <div class="form-check">
                      <label class="form-check-label" for="defaultCheck1">
                          موافق علي الشروط و الاحكام
                          </label>
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  </div>
              </div>

              <div class="row d-flex justify-content-center" id="send-request-btn">
                  <button type="submit" class="btn btn-success" id="btn-submit">ارسال الطلب</button>
              </div>

          </div>
      </div>
  </div>

@endsection
