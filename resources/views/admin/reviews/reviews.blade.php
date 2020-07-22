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
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($reviews as $review)

            <tr class="table">
              <td>{{$review->id}}</td>
              <td>{{$review->client_id}}</td>
              <td>{{$review->provider_id}}</td>
              <td ><a href="{{asset('Dashboard\Users')}}\{{$review->id}}" class="btn btn-primary">مشاهده</a><a href="DeleteUser/" class="btn btn-danger">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
