@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>مسلسل</th>
            <th>اسم العميل</th>
            <th>اسم مقدم الخدمه</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($reports as $report)

            <tr class="table">
              <td>{{$report->id}}</td>
              <td>{{$report->report}}</td>
              <td>{{$report->report}}</td>
              <td ><a href="{{asset('Dashboard\Users')}}\{{$report->id}}" class="btn btn-primary">مشاهده</a><a href="DeleteUser/" class="btn btn-danger">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
