@extends('includes.master')
@section('css')
  <style media="screen">
  .container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }

  /* Darker chat container */
  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }

  /* Clear floats */
  .container::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Style images */
  .container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }

  /* Style the right image */
  .container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }

  /* Style time text */
  .time-right {
    float: right;
    color: #aaa;
  }

  /* Style time text */
  .time-left {
    float: left;
    color: #999;
  }
</style>
@endsection
@section('title')
  الرسائل
@endsection
@section('body')

  <div class="app-main__outer">
    <div class="app-main__inner">
     @foreach ($messages as $message)

      <div class="container">
        <img src="{{asset('images')}}/{{$message->user->image}}" alt="Avatar">
        <small>{{$message->user->name}}</small>
        <p>{{$message->message}}</p>
        <span class="time-right">{{date('d-m-Y H:I' , strtotime( $message->created_at ))}}</span>
      </div>


    @endforeach
    </div>
  </div>
@endsection
