@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">
      @if (count($errors)>0)
        @include('includes.erorrs')
      @endif
      @if(session()->has('message'))
      @include('includes.success')
      @endif
      <form class="" action="{{asset('Dashboard/Roles/AddRole')}}" method="post">
        <input type="text" name="name" placeholder="اضف وظيفه جديده" autocomplete="off">
        <button type="submit" class="btn btn-primary">اضف جديد</button>
        @csrf
      </form>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>الوظيفه</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($roles as $role)

            <tr class="table">
              <td>{{$role->id}}</td>
              <td>{{$role->role}}</td>
              <td ><a href="{{asset('Dashboard/Roles/DeleteRole')}}/{{$role->id}}" class="btn btn-danger" onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
