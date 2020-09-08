<div class="scrollbar-sidebar">
<div class="app-sidebar__inner">
 <ul class="vertical-nav-menu">
   @php
     use App\order;
   @endphp
   <li class="app-sidebar__heading">الرئيسيه</li>
   <li>

       <a href="{{asset('Dashboard')}}" class='{{Session::get('active')=='Dashboard'?"active":'mm-active'}}'>

       <i class="metismenu-icon pe-7s-rocket"></i>
       الصفحه الرئيسية
     </a>
   </li>
   <li >
     <a href="{{asset('Dashboard\Users')}}" class='{{Session::get('active')=='Users'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       المستخدمين
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Admins')}}" class='{{Session::get('active')=='Admins'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       المديرين
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Roles')}}" class='{{Session::get('active')=='Roles'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       التسلسل الوظيفي
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Skills')}}"  class='{{Session::get('active')=='Skills'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       المهارات
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Jobs')}}"  class='{{Session::get('active')=='Jobs'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       الاعمال
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Locations')}}"  class='{{Session::get('active')=='Locations'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       البلاد
     </a>
   </li>
   <li >
     <a href="{{asset('Dashboard\SuccessedOrders')}}"  class='{{Session::get('active')=='SuccessedOrders'?"active":'mm-active'}}btn btn-success' >
      <i class="metismenu-icon fa fa-edit"></i>
    العمليات الناجه  ({{order::where('status', 2)->count()}})
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\DelayedOrders')}}"  class='{{Session::get('active')=='DelayedOrders'?"active":'mm-active'}}btn btn-primary'>
      <i class="metismenu-icon fa fa-edit"></i>
    العمليات المعلقه ({{order::where('status', 0)->count()}})
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\OngoingOrders')}}"  class='{{Session::get('active')=='OngoingOrders'?"active":'mm-active'}}btn btn-warning'>
      <i class="metismenu-icon fa fa-edit"></i>
    العمليات الجاريه  ({{order::where('status', 1)->count()}})
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\FailedOrders')}}"  class='{{Session::get('active')=='FailedOrders'?"active":'mm-active'}}btn btn-danger'>
      <i class="metismenu-icon fa fa-edit"></i>
    العمليات الفاشله  ({{order::where('status', -1)->count()}})
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\UsreMoney')}}"  class='{{Session::get('active')=='UsreMoney'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       الاموال المعلقه
     </a>
   </li>
   <li hidden>
     <a href="{{asset('Dashboard\Reports')}}"  class='{{Session::get('active')=='Reports'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       التفيمات السيئه
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\Chats')}}"  class='{{Session::get('active')=='Chats'?"active":'mm-active'}}'>
       <i class="metismenu-icon fa fa-edit"></i>
       المحادثات
     </a>
   </li>
   <li>
     <a href="{{asset('Dashboard\Sittings')}}"  class='{{Session::get('active')=='Sittings'?"active":'mm-active'}}'>
      <i class="metismenu-icon fa fa-edit"></i>
       الاعدادات
     </a>
   </li>

</div>
</div>
</div>
