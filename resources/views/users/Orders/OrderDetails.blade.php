@extends('users.layout.master')
@section('title')
تفاصيل المعامله
@endsection
@section('body')
      <div class="container-fluid">
          <div class="image-container">
              <img src="{{asset('images/wfh.png')}}" class="img-fluid" alt="Responsive image">
              <h1 class="centered">تفاصيل الخدمه</h1>
          </div>
          @include('includes.success')


          <!--login card-->
          <div class="card" id="registration-card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <h5 class="card-title header-text">تفاصيل الخدمه</h5>
                  </div>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">اسم طالب الخدمه : {{$order->invoice->client_name}} </p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">اسم منفذ الخدمه :{{$order->invoice->provider_name}} </p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">رقم جوال طالب الخدمه : {{$order->invoice->client_phone}}</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">رقم جوال منفذ الخدمه : {{$order->invoice->provider_phone}}</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">نوع الخدمه : {{$order->job_name}} </p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">مده الاتفاق : {{$order->invoice->duration}} </p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">قيمه الطلب :  {{$order->invoice->price}}ريال</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">تفاصيل الخدمه : {{$order->description}}</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">كود الخدمه : {{$order->code}}</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">وقت بدأ التنفيذ :{{$order->start_time}}</p>
                  <p class="text-right mt-0 mb-0" id="payment-text-black">وقت انتهاء التنفيذ :{{$order->end_time}}</p>


@if ($order->status==0&&Auth::user()->role=='مقدم خدمه')

                  <div class="row d-flex justify-content-center mt-4">
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-success btn-block mt-2" id="btn-accept-decline" data-toggle="modal" data-target="#acceptModal">قبول</button>
                      </div>
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-secondary btn-block mt-2" id="btn-accept-decline" data-toggle="modal" data-target="#declineModal">رفض</button>
                      </div>
                  </div>
@elseif ($order->status==-1)
  <div class="">
    سبب رفض العرض <h2>{{$order->cancel}}</h2>
  </div>
@endif


                  <!-- Modal for decline -->
                  <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">من فضلك اكتب سبب الرفض </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                              </div>
                              <div class="modal-body">
                                  <form  class="" action="{{asset('Home/Orders/OrdersDetails')}}/{{$order->id}}/cancel" method="post">
                                    @csrf
                                      <div class="form-group">
                                          <textarea class="form-control" name="cancel" id="message-text"></textarea>

                                      </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                  <button type="submit" class="btn btn-success">ارسال</button>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>


                  <!-- Modal for accept -->
                  <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من قبول المعامله ؟</h5>
                                  <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                              </div>
                              <div class="modal-body">
                                  لايمكنك الرجوع في حاله قيامك بتأكيد المعامله
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                  <a href="{{asset('Home/Orders/OrdersDetails')}}/{{$order->id}}/accept" type="button" class="btn btn-success">تأكيد</a>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>

@endsection
