@extends('includes.master')

@section('body')

  @include('includes.information')
  <!--== activeusers ==-->
  @include('includes.activeUsers')

  <!--== Target ==-->
  @include('includes.target')
@endsection
