
@extends('includes.master')
@section('title')
  المحادثات
@endsection
@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">
      <div class="panel panel-default">

     
     

      <table class="table table-striped table-bordered display" id='table_id'>
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم طالب الخدمه</th>
            <th>اسم مقدم الخدمات</th>
            <th>اسم الخدمه</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($chats as $chat)

<tr class="table">
  <td>{{$chat->id}}</td>
  <td>{{$chat->sender_name}}</td>
  <td>{{$chat->receiver_name}}</td>
  <td>{{$chat->order->job_name}}</td>
  
  
  <td ><a href="{{asset('Dashboard/Chats/Chat')}}/{{$chat->id}}" class="btn btn-primary">تفاصيل</a>
        <a href="{{asset('Home/chats')}}/{{$chat->id}}" class="btn btn-success" >دخول المحادثه</a>
  </td>

       
     </tr>
       @endforeach  
        </tbody>
      </table>

    </div>
    </div>
  </div>

@endsection
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){
      fetch_customer_data();
     function fetch_customer_data(query='')
     {
       $.ajax({
         url:"{{route('search.action')}}",
         method:'GET',
         data:{query:query},
         dataType:'json',
         success:function(data)
         {
           $('tbody').html(data.table_data);
           $('#total_records').text(data.total_data);

         }
       })
     }
     $(document).on('keyup','#search',function(){
       var query=$(this).val();
       fetch_customer_data(query);
     });

    });
  </script>

  -->



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
