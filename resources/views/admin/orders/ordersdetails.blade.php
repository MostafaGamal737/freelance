
@extends('includes.master')

@section('body')
<style media="screen">
  th {text-align:center;}
  td {text-align:center;}
  table {
    border-collapse: collapse;
    width: 100%;
  }

  table, th, td {
    border: 1px solid black;
  }
</style>
  <div class="app-main__outer">

    <div class="app-main__inner">
      <table class="table" style="border: 1px solid black;">
    <thead class="thead-dark">
      <tr>
        <th colspan="2" >تفاصيل الطلب</th>
        <th colspan="2">تفاصيل الفاتوره</th>
          </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>مسلسل الخدمه</td>
        <th>{{$order->invoice->id}}</th>
        <td>مسلسل الفاتوره</td>
      </tr>
      <tr>
        <th scope="row">{{$order->invoice->provider_name}}</th>
        <td>اسم مقدم الخدمه</td>
        <th>{{$order->invoice->provider_phone}}</th>
        <td>رقم مقدم الخدمه</td>
      </tr>
      <tr>
        <th scope="row">{{$order->invoice->client_name}}</th>
        <td>اسم طالب الخدمه</td>
        <th>{{$order->invoice->client_phone}}</th>
        <td> رقم طال الخدمه</td>
      </tr>

      <tr>
        @if ($order->customer_money_status==0)
          <th scope="row">لم يتم السداد بعد</th>
        @else
          <th scope="row">لفد تم السداد</th>
        @endif
        <td>سداد اموال العميل</td>
        <th>{{$order->invoice->transaction_id}}</td>
        <td>رقم عملية التحويل</td>
      </tr>
      <tr>
        <th scope="row">{{$order->job_name}}</th>
        <td>اسم الخدمه المطلوبه</td>
        <th>{{$order->invoice->price}}ريال </td>
        <td>قيمة الطلب</td>
      </tr>
      <tr>
        <th scope="row">{{$order->description}}</th>
        <td>تفاصيل الخدمه</td>
        <th>{{$order->invoice->tax}}%</td>
        <td>نسبة الموقع</td>
      </tr>
      <tr>
        <th scope="row">{{$order->start_time}}</th>
        <td>بدأ العمليه</td>
        <th>{{$order->invoice->duration}} ايام</td>
        <td>مدة تنفيذ الطلب</td>
      </tr>
      <tr>
        <th scope="row">{{$order->end_time}}</th>
        <td>انتهاء العمليه</td>
        <th>{{$order->invoice->app_money}} ريال</td>
        <td>اموال الموقع </td>
      </tr>

    </tbody>
  </table>


    </div>
  </div>

@endsection
