@extends('includes.master')
@section('title')
  الصفحه الرئيسية
@endsection
@section('body')

  @include('includes.information')
  <!--== activeusers ==-->
  @include('includes.activeUsers')

  <!--== Target ==-->
  @include('includes.target')
@endsection
