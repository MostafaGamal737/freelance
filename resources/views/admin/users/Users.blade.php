@extends('includes.master')
@section('title')
  المستخدمين
@endsection
@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
    <a href="{{asset('Dashboard/Users/AddUser')}}" class="btn btn-primary"hidden>اضف جديد</a>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
 
    
  
      </form>
      <table class="table table-striped" id='table_id'>
        <thead>
          <tr>
            <th>الاسم</th>
            <th>البريد الالكتروني</th>
            <th>الجوال</th>
            <th>الوظيفه</th>
            <th>البلد</th>
            <th >الفعل</th>
            <th >مدير</th>
          </tr>
        </thead>
        <tbody>

    @foreach ($users as $user)

          <tr class="table">
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
          <td id='role'>{{$user->role}}</td>
          <td>{{$user->location}}</td>
            <td ><a href="{{asset('Dashboard\Users')}}\{{$user->id}}" class="btn btn-primary">مشاهدة</a>
            @if(Auth::user()->role=='مدير عام')
            <a hidden href="{{asset('Dashboard\Users\Update')}}\{{$user->id}}" class="btn btn-info">تعديل</a>
            <a  href="{{asset('Dashboard/Users/DeleteUser')}}/{{$user->id}}" class="btn btn-danger"onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');">حذف</a>

            </td>
            <td><input name='{{$user->id}}' type="checkbox"    {{($user->role=='مدير')?'checked':''}} ></td>
            @endif

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
  <script>
     $('table td input[type=checkbox]' ).click(function() {
  var  id = (this.name) ; // button ID
  if(confirm('هل انتا متأكد !!')==true){
     $.ajax({

                    /* the route pointing to the post function */
                    url: '/Dashboard/Users/Update/admin/'+id,
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: '{{csrf_token()}}','id':id,'admin':this.checked},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      console.log('data');
                      location.reload(true);
                    },
                    error:function(x,e) {
                      location.reload(true);
                    }

                    
                });
              }
              else{
                if(this.checked==true){
                  this.checked=false;
                }
                else{
                  this.checked=true;
                }
  
} 
});


    </script>
    @endsection
