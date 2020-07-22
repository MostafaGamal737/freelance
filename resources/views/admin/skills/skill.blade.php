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
      <form class="" action="{{asset('Dashboard/Skills/AddSkill')}}" method="post">
        <input type="text" name="name" placeholder="اضف مهاره جديده" autocomplete="off">
        <button type="submit" class="btn btn-primary">اضف جديد</button>
        @csrf
      </form>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>المسلسل</th>
            <th>المهاره</th>
            <th >الفعل</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($skills as $skill)

            <tr class="table">
              <td>{{$skill->id}}</td>
              <td>{{$skill->skill}}</td>
              <td ><a href="{{asset('Dashboard/Skills/DeleteSkill')}}/{{$skill->id}}" class="btn btn-danger"onclick="return confirm('هل ترغب في اتمام عملية الحذف؟');">حذف</a></td>
            </tr>
          @endforeach
          @csrf
        </tbody>
      </table>
    </div>
  </div>
@endsection
