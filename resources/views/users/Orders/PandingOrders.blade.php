@extends('users.layout.master')
@section('title')
معاملات معلقه
@endsection
@section('body')

      <div class="container-fluid">

  <div class="image-container">
              <img src="{{asset('images/wfh.png')}}" class="img-fluid"style="width:100%" alt="Responsive image">
                 <h1 class="centered" id="pending-deal-txt">المعاملات معلقه</h1>

          </div>
          <!--card-->
          <div class="list-group m-5">
           @if(count($orders)>0)
            @foreach ($orders as  $order)

                          <a  href="{{asset('Home/Orders/OrdersDetails')}}/{{$order->id}}" type="button" class="list-group-item list-group-item-action">

                              <div class="media">
                                  <div class="row media-body">
                                      <div class="container">
                                          <div class="row flex-column-reverse flex-md-row mt-3">

                                            <div class="col-sm ">
                                              <p class="mt-0" id="pending-deal-txt">{{$order->job_name}}</p>
                                            </div>

                                            <div class="col-sm " >
                                              <p class="mt-0" id="pending-deal-txt">{{$order->invoice->price}} ريال</p>
                                            </div>

                                            <div class="col-sm">
                                              <h5 class="mt-0"id="pending-deal-txt">{{$order->invoice->provider_name}}</h5>
                                            </div>

                                          </div>
                                      </div>
                                  </div>
                                      <img src="{{asset('images/Avatar.png')}}" class="lign-self-center mr-3" alt="avatar" id="avatar">
                              </div>

                          </a>
                        @endforeach
            @else
           <div class='d-flex justify-content-center'>لا يوجد معاملات </div>
           @endif
          </div>
      </div>


@endsection
