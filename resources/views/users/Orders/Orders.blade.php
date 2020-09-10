@extends('users.layout.master')
@section('title')
المعاملات
@endsection
@section('body')
  <div class="container-fluid">

     <div class="image-container">
             <img src="{{asset('images/wfh.png')}}" class="img-fluid"style="width:100%" alt="Responsive image">
                    <h1 class="centered">أنجز معاملاتك بسهولة وأمان</h1>
         </div>

         <!--card-->
         <div class="row row-cols-1 row-cols-md-2 mt-4">
             <div class="col mb-4">
                 <div class="card" id="deals-card">
                    <div class=""style="background-color:green;height:120px">
                       <h1 style="text-align: center;margin-top: 20px;">{{App\order::where('user_id',Auth::id())->where('status',2)->orwhere('provider_id',Auth::id())->where('status',2)->count()}}</h1>
                    </div>
                     <div class="card-body">
                        <a href="{{asset('Home/Orders/SuccessedOrders')}}">  <h5 class="card-title " id="successfull-deal-txt" style=" text-align: right;">المعاملات الناجحه</h5></a>
                         <p class="card-text" id="successfull-deal-txt" style=" text-align: right;margin: auto;">هي المعاملات التي انتهنت بنجاح و تم تحويل مقابلها المادي بدون مشاكل</p>
                     </div>
                 </div>
             </div>
             <div class="col mb-4">
                 <div class="card" id="deals-card">

                      <div class=""style="background-color:yellow;height:120px">
                         <h1 style="text-align: center;margin-top: 20px;">{{App\order::where('user_id',Auth::id())->where('status',1)->orwhere('provider_id',Auth::id())->where('status',1)->count()}}</h1>
                      </div>
                      <div class="card-body">
                        <a href="{{asset('Home/Orders/UnderWayOrders')}}"> <h5 class="card-title" id="underway-deal-txt" style=" text-align: right;">المعاملات قيد التنفيذ</h5></a>
                         <p class="card-text" id="underway-deal-txt" style=" text-align: right;margin: auto;">هي المعاملات التي يتم تنفيذها في الوقت الحالي من خلالك او من خلال الطرف الاخر</p>

                     </div>
                 </div>
             </div>
             <div class="col mb-4">
                 <div class="card" id="deals-card">
                   <div class=""style="background-color:blue;height:120px">
                      <h1 style="text-align: center;margin-top: 20px;">{{App\order::where('user_id',Auth::id())->where('status',0)->orwhere('provider_id',Auth::id())->where('status',0)->count()}}</h1>
                   </div>
                    <div class="card-body">
                      <a href="{{asset('Home/Orders/PandingOrders')}}">   <h5 class="card-title" id="pending-deal-txt" style=" text-align: right;">المعاملات المعلقه</h5></a>
                         <p class="card-text" id="pending-deal-txt" style=" text-align: right;margin: auto;">هي المعاملات التي تنتظر موافقه الطرف الاخر او تم تعليقها من قبل الاداره</p>
                     </div>
                 </div>
             </div>
             <div class="col mb-4">
                 <div class="card" id="deals-card">
                   <div class=""style="background-color:red;height:120px">
                      <h1 style="text-align: center;margin-top: 20px;">{{App\order::where('user_id',Auth::id())->where('status',-1)->orwhere('provider_id',Auth::id())->where('status',-1)->count()}}</h1>
                   </div>
                            <div class="card-body">
                        <a href="{{asset('Home/Orders/FailedOrders')}}"> <h5 class="card-title" id="failed-deal-txt" style=" text-align: right;">المعاملات الفاشله</h5></a>
                         <h2 class="card-text" id="failed-deal-txt" style=" text-align: right;margin: auto;">هي المعاملات التي حدث بها مشكلات مع الطرف الاخر و لم تكتمل </h2>
                     </div>
                 </div>
             </div>
         </div>
     </div>

@endsection
