@extends('includes.master')
@section('title')
  الاموال المعلقه
@endsection
@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">


      <table class="table table-striped" id='table_id'>
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
              <td>{{($order->invoice->price)}}</td>

              <td ><a href="{{asset('Dashboard/orders')}}/{{$order->id}}" class="btn btn-primary">مشاهده</a>
             <a href="{{asset('Dashboard/orders/returnMoney')}}/{{$order->id}}" class="btn btn-info">رد الاموال</a>
              </td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('jsSection')

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
          "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
    "sLoadingRecords": "جارٍ التحميل...",
    "sProcessing":   "جارٍ التحميل...",
    "sLengthMenu":   "أظهر _MENU_ مدخلات",
    "sZeroRecords":  "لم يعثر على أية سجلات",
    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "sInfoPostFix":  "",
    "sSearch":       "ابحث:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "الأول",
        "sPrevious": "السابق",
        "sNext":     "التالي",
        "sLast":     "الأخير"
        }}

    } );
} );

</script>

@endsection