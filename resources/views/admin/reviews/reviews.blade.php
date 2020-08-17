@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">


      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th>حالة العمليه</th>
            <th >الاموال المعلقه</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($orders as $order)

            <tr class="table">
              <td>{{$order->id}}</td>
              <td>{{$order->invoice->client_name}}</td>
              <td>{{$order->invoice->provider_name}}</td>
              @if ($order->status==0)
                <td>معلقه</td>

              @elseif ($order->status==-1)
                <td>فاشله</td>

              @elseif ($order->status==1)
                <td>جاريه</td>

            @elseif ($order->status==2)
                <td>ناجحه</td>
              @endif
              <td>{{($order->invoice->price)-($order->invoice->app_money)}}</td>

              <td ><a href="{{asset('Dashboard/orders')}}/{{$order->id}}" class="btn btn-primary">مشاهده</a>
             <a href="{{asset('Dashboard/orders')}}/{{$order->id}}" class="btn btn-info">رد الاموال</a>
              </td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
