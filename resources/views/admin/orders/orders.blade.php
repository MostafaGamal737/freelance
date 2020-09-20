@extends('includes.master')
@section('title')
  المعاملات
@endsection
@section('body')
  <div class="app-main__outer">
  <form class="form" action="{{asset('Dashboard/search/order')}}" method="get">
       <div class="form-group">
@csrf
       <input required class="form-control col-lg-2" type="text" name="search" value="" placeholder="بحث" style="text-align:right;">
       <input class="btn btn-primary form-control col-lg-2" type="submit" name="" value="بحث">
     </div>
     @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif

     </form>
    <div class="app-main__inner">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th>اسم الخدمه </th>
            <th>كود الخدمه </th>
            <th >action</th>
          </tr>
        </thead>
        <tbody>
         
          @foreach ($orders as $order)

            <tr class="table">
              <td>{{$order->id}}</td>
              <td>{{$order->user->name}}</td>
              <td>{{$order->invoice->provider_name}}</td>
              <td>{{$order->job_name}}</td>
              <td>{{$order->code}}</td>
              <td ><a href="{{asset('Dashboard/orders')}}/{{$order->id}}" class="btn btn-primary">تفاصيل</a><a href="DeleteUser/" class="btn btn-danger" hidden>حذف</a>
              @if($order->approved_status=='قيد الانتظار')
                <a href="{{asset('Dashboard/orders/Approved')}}/{{$order->id}}" class="btn btn-success" >تفعيل</a>
              @endif
            </td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
