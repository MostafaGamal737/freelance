@extends('includes.master')
@section('title')
  المعاملات
@endsection
@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th>اسم الخدمه </th>
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
              <td ><a href="{{asset('Dashboard/orders')}}/{{$order->id}}" class="btn btn-primary">تفاصيل</a><a href="DeleteUser/" class="btn btn-danger" hidden>حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
