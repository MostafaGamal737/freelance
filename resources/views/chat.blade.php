@extends('includes.master')

@section('body')

  <div class="app-main__outer" id="app">

    <div class="app-main__inner">
<chat :user="{{App\user::find(1)}}"></chat>
    </div>
  </div>
@endsection
