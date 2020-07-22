@extends('includes.master')

@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">
    <a href="{{asset('Dashboard/Users/AddUser')}}" class="btn btn-primary">اضف جديد</a>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
      </form>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>الاسم</th>
            <th>الايمال</th>
            <th>الجوال</th>
            <th>الوظيفه</th>
            <th>البلد</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

    @foreach ($users as $user)

          <tr class="table">
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            @if ($user->role_id=="")<td>لايوجد</td>@else <td>{{$user->Role->role}}</td>@endif
          @if ($user->location_id=="")<td>لايوجد</td>@else<td>{{$user->location->location}}</td>@endif
            <td ><a href="{{asset('Dashboard\Users')}}\{{$user->id}}" class="btn btn-primary">مشاهدة</a><a href="{{asset('Dashboard/Users/DeleteUser')}}/{{$user->id}}" class="btn btn-danger"onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');">حذف</a></td>
            </tr>
    @endforeach
@csrf
          </tbody>
        </table>
      </div>
    </div>
  @endsection
