@extends('users.layout.master')
@section('title')
معاملات معلقه
@endsection
@section('body')
@php
$Sitting= App\sitting::first();
@endphp
  <div class="container-fluid">
  <div class="image-container">
          <img src="{{asset('images/wfh.png')}}" class="img-fluid" alt="Responsive image" style="width:100%">
              <h1 class="centered">طريقة الدفع</h1>

      </div>

      <!--login card-->
      <div class="card" id="payment-card">
          <div class="card-body">
              <div class="row d-flex justify-content-center">
                  <h5 class="card-title header-text">قم بأرسال الاموال لتفعيل الخدمه</h5>
              </div>
              <div class=""style="text-align: right;">
                  <h7  >رقم الحساب الخاص بنا</h7>
                  <input class="form-control" type="text" placeholder="رقم البطاقه" disabled value="{{$Sitting->card_number}}" >
              </div>
              <div class=""style="text-align: right;">
                 <h7>رقم الBAIN الخاص بنا</h7>
                  <input class="form-control " type="datetime"  disabled value="{{$Sitting->iban}}" >
              </div>
              
              <div class="payment-texts">
                  <p class="text-right" id="payment-text-green">كود الخدمه : {{$order->code}}</p>
                  <p class="text-right" id="payment-text">قيمة الخدمه : {{$order->invoice->price}} ريال</p>
                  <p class="text-right" id="payment-text">رسوم الخدمه : {{($order->invoice->price)*($Sitting->tax/100)}} ريال</p>
                  <hr/>
                  <p class="text-right" id="payment-text-black">المبلغ الكلى : {{$order->invoice->price+(($order->invoice->price)*($Sitting->tax/100))}} ريال</p>
                  <p class="text-right" id="payment-text-green">حالة الدفع : فى الانتظار</p>
                  <p class="text-right" id="payment-text" hidden>رسوم الاستراجاع =30 ريال ( فى حالة الغاء الخدمه من قبل طالب الخدمه)</p>
              </div>
              <div class="row d-flex justify-content-center" id="send-request-btn" >
                  <button type="submit"  class="btn btn-success" id="btn-submit" hidden>متابعه</button>
              </div>

          </div>
      </div>
  </div>


@endsection
