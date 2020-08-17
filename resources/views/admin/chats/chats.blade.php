
@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">
      <div class="panel panel-default">

      <div class="panel-body">
        <input type="text" name="search" id="search"class="form-control" value="" style="width:300px">
      </div>
      <h3 align="center">النتائج <span id="total_records"></span></h3>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th>اسم المحادثه</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @csrf
        </tbody>
      </table>

    </div>
    </div>
  </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('jsSection')
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
@endsection
