@extends('users.layout.master')
@section('title')
تفاصيل المعامله
@endsection
@section('body')


  <div class="image-container">
              <img src="{{asset('images/wfh.png')}}" class="img-fluid" alt="Responsive image">
          <h1 class="centered">قم بتقديم طلب تنفيذ خدمه</h1>
          </div>
          <!--login card-->
          @if(session()->has('message'))
              <div class="row d-flex justify-content-center alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
          @if(session()->has('error'))
            <div class="row d-flex justify-content-center alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
          <div class="card" id="registration-card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <h5 class="card-title header-text">تقديم طلب</h5>
                  </div>
                  <form class="" action="{{asset('Home/MakeOrder')}}" method="post">
@csrf

                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text">بيانات طالب الخدمه</strong>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <input name="client_name" required class="form-control" type="phone" placeholder="اسم طالب الخدمه">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="client_phone" required class="form-control" type="phone" placeholder="رقم الجوال الخاص بطالب الخدمه">
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text">بيانات مقدم الخدمه</strong>
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="provider_name" required class="form-control" type="phone" placeholder="اسم مقدم الخدمه">
                  </div>

                  <div class="row d-flex justify-content-center">
                      <input name="provider_phone" required class="form-control" type="phone" placeholder=" رقم الجوال الخاص بمقدم الخدمه">
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text">نوع الخدمه</strong>
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="job_name" required class="form-control" type="text" placeholder="نوع الخدمه">
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text ">مدة الخدمه</strong>
                      <input required name="duration" class="form-control card-title header-tex talign-middle" type="number" value="" min="1" max="20" step="1"/ placeholder="0">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="price" required class="form-control" type="text" placeholder="الملبلغ المتفق عليه">
                      <input type="hidden" name="tax" value="5">
                      <input type="hidden" name="transaction_id" value="555544">
                      <input type="hidden" name="status" value="1">
                      <input type="hidden" name="customers_money_status" value="0">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <textarea  name="description" required class="form-control" placeholder="تفاصيل الخدمه "></textarea>
                  </div>

                  <div class="row" id="check-row">
                      <div class="form-check">
                          <label class="form-check-label" for="defaultCheck1">
                              موافق علي الشروط و الاحكام
                              </label>
                          <input required class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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