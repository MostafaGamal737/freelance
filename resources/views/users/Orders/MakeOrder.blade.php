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
                    <input name="client_name" required class="form-control" type="text" placeholder="اسم طالب الخدمه"oninvalid="this.setCustomValidity('ادخل اسم طالب طالب الخدمه')"
                    oninput="setCustomValidity('')">


                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="client_phone" required class="form-control" type="text" placeholder="رقم الجوال الخاص بطالب الخدمه" oninvalid="this.setCustomValidity('ادخل رقم طالب الخدمه')"
                      oninput="setCustomValidity('')">
                      @if (!empty($errors->has('client_phone')))
                        <small class="text-danger">{{$errors->first('client_phone')}}</small>
                      @endif
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text">بيانات مقدم الخدمه</strong>
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="provider_name" required class="form-control" type="text" placeholder="اسم مقدم الخدمه" oninvalid="this.setCustomValidity('ادخل اسم مقدم الخدمه')"
                      oninput="setCustomValidity('')">
                  </div>

                  <div class="row d-flex justify-content-center">
                      <input name="provider_phone" required class="form-control" type="text" placeholder=" رقم الجوال الخاص بمقدم الخدمه"oninvalid="this.setCustomValidity('ادخل رقم مقدم الخدمه')"
                      oninput="setCustomValidity('')">
                      @if (!empty($errors->has('provider_phone')))
                        <small class="text-danger">{{$errors->first('provider_phone')}}</small>
                      @endif
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text">نوع الخدمه</strong>
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="job_name" required class="form-control" type="text" placeholder="نوع الخدمه" oninvalid="this.setCustomValidity('ادخل نوع الخدمه المطلوبه')"
                      oninput="setCustomValidity('')">
                  </div>
                  <div class="row d-flex flex-row-reverse">
                      <strong class="card-title header-text ">مدة الخدمه</strong>
                      <input required name="duration" class="form-control card-title header-tex talign-middle" type="number" value="" min="1" max="20" step="1"/ placeholder="0" oninvalid="this.setCustomValidity('يجب ادخال المده المحدده')"
                      oninput="setCustomValidity('')">
                      @if (!empty($errors->has('duration')))
                        <small class="text-danger">{{$errors->first('duration')}}</small>
                      @endif
                  </div>
                  <div class="row d-flex justify-content-center">
                      <input name="price" required class="form-control" type="text" placeholder="الملبلغ المتفق عليه"oninvalid="this.setCustomValidity('ادخل الملبلغ المتفق عليه')"
                      oninput="setCustomValidity('')">
                      @if (!empty($errors->has('price')))
                        <small class="text-danger">{{$errors->first('price')}}</small>
                      @endif
                      <input type="hidden" name="tax" value="5">
                      <input type="hidden" name="transaction_id" value="555544">
                      <input type="hidden" name="status" value="1">
                      <input type="hidden" name="customers_money_status" value="0">
                  </div>
                  <div class="row d-flex justify-content-center">
                      <textarea  name="description" required class="form-control" placeholder="تفاصيل الخدمه " oninvalid="this.setCustomValidity('ادخل تفاصيل الخدمه')"
                      oninput="setCustomValidity('')"></textarea>
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
