@extends('users.layout.master')
@section('title')
المحادثات
@endsection
@section('body')

      <div class="container-fluid">

  <div class="image-container">
              <img src="{{asset('images/wfh.png')}}" class="img-fluid" alt="Responsive image">
                 <h1 class="centered" id="failed-deal-txt">المحادثات</h1>

          </div>
          <!--card-->
          <div class="list-group m-5">
            @foreach ($chats as  $chat)

                          <a href="{{asset('Home/chats')}}/{{$chat->id}}"type="button" class="list-group-item list-group-item-action">

                              <div class="media">
                                  <div class="row media-body">
                                      <div class="container">
                                          <div class="row flex-column-reverse flex-md-row mt-3">



                                            <div class="col-sm " >
                                              <p class="mt-0" id="failed-deal-txt">المحادثه</p>
                                            </div>

                                            <div class="col-sm">
                                              <h5 class="mt-0"id="failed-deal-txt">{{date("d/m/Y", strtotime($chat->created_at))}}</h5>
                                            </div>
                                            <div class="col-sm ">
                                              @if (Auth::user()->role=='طالب خدمه'&&Auth::id()==$chat->sender_id)

                                                <p class="mt-0" id="failed-deal-txt">{{App\user::find($chat->receiver_id)->name}}</p>
                                                @else
                                                  <p class="mt-0" id="failed-deal-txt">{{App\user::find($chat->sender_id)->name}}</p>

                                              @endif
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                      <img src="{{asset('images/Avatar.png')}}" class="lign-self-center mr-3" alt="avatar" id="avatar">
                              </div>

                          </a>
                        @endforeach
          </div>
      </div>


@endsection