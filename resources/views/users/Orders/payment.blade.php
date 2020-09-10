@extends('users.layout.master')
@section('title')
معاملات معلقه
@endsection
@section('body')

  <div class="container-fluid">
  <div class="image-container">
          <img src="{{asset('images/wfh.png')}}" class="img-fluid" alt="Responsive image" style="width:100%">
              <h1 class="centered">طريقة الدفع</h1>

      </div>

      <!--login card-->
      <div class="card" id="payment-card">
          <div class="card-body">
              <div class="row d-flex justify-content-center">
                  <h5 class="card-title header-text">ادخل بيانات البطاقه البنكية خاصتك</h5>
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="رقم البطاقه">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control col-3" type="text" placeholder="cvv" style="margin-right: 50px;">
                  <input class="form-control col-6" type="datetime" placeholder="تاريخ الانتهاء">
              </div>
              <div class="row d-flex justify-content-center">
                  <input class="form-control" type="text" placeholder="الاسم الموجود علي البطاقه">
              </div>
              <div class="payment-texts">
                  <p class="text-right" id="payment-text-green">رقم الطلب : 364525</p>
                  <p class="text-right" id="payment-text">قيمة الطلب : 1500 ريال</p>
                  <p class="text-right" id="payment-text">رسوم الطلب : 120 ريال</p>
                  <hr/>
                  <p class="text-right" id="payment-text-black">المبلغ الكلى : 1620 ريال</p>
                  <p class="text-right" id="payment-text-green">حالة الدفع : فى الانتظار</p>
                  <p class="text-right" id="payment-text">رسوم الاستراجاع =30 ريال ( فى حالة الغاء الخدمه من قبل طالب الخدمه)</p>
              </div>
              <div class="row d-flex justify-content-center" id="send-request-btn">
                  <button type="submit" class="btn btn-success" id="btn-submit">متابعه</button>
              </div>

          </div>
      </div>
  </div>


@endsection
