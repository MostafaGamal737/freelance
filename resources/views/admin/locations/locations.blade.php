@extends('includes.master')

@section('body')

  <div class="app-main__outer">

    <div class="app-main__inner">

          @foreach($errors->all() as $error)
            <h5 class="alert alert-danger" >{{$error}}</h5>
          @endforeach
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
      @endif
      <form class="" action="{{asset('Dashboard/Locations/AddLocation')}}" method="post">
        <input type="text" name="name" placeholder="اضف بلد جديده" autocomplete="off">
        <button type="submit" class="btn btn-primary">اضف جديد</button>
        @csrf
      </form>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>البلد</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($locations as $location)

            <tr class="table">
              <td>{{$location->id}}</td>
              <td>{{$location->location}}</td>
              <td ><a href="{{asset('Dashboard/Locations/DeleteLocation')}}/{{$location->id}}" onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');" class="btn btn-danger">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
