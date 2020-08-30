
@extends('includes.master')
@section('title')
  بيانات المستخدم
@endsection
@section('body')
  <div class="app-main__outer">
    <div class="app-main__inner">

      <form method="post">
        <div class="row">
          <div class="col-md-4">
            <div class="profile-img">
              <img src="{{asset('images')}}/{{$user->image}}" alt=""/ style="width:350px;height:180px;">

            </div>
          </div>
          <div class="col-md-6">
            <div class="profile-head">
              <h5 class="p-3 mb-2 bg-white text-dark">
              الاسم:  {{$user->name}}
                </h5>
              <h6 class="p-3 mb-2 bg-light text-dark">
               {{$user->role}}:الوظيفه
              </h6>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">معلومات شخصيه</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">معلومات مهنيه</a>
                </li>
              </ul>
            </div>
          </div>

        </div>
        <div class="row">

          <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-6 ">
                    <label class="">المسلسل</label>
                  </div>
                  <div class="col-md-6">
                    <p class="p-3 mb-2 bg-primary text-white">{{$user->id}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>الاسم</label>
                  </div>
                  <div class="col-md-6">
                    <p class="p-3 mb-2 bg-success text-white">{{$user->name}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>البريد الالكتروني</label>
                  </div>
                  <div class="col-md-6">
                    <p class="p-3 mb-2 bg-danger text-white">{{$user->email}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>الجوال</label>
                  </div>
                  <div class="col-md-6">
                    <p class="p-3 mb-2 bg-dark text-white">{{$user->phone}}</p>
                  </div>
                </div>
                <div class="row" hidden>
                  <div class="col-md-6">
                    <label>المهارات</label>
                  </div>
                  <div class="col-md-6">
                    @foreach ($user->skills as $skill)

                      <p>{{$skill->skill}}</p>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-6">
                    <label>العمليات المنجذه</label>

                  </div>
                  <div class="col-md-6 "  >
                  @if (count($user->reports)>0)

                      <p>{{((1)-(count($user->reports)/(count($user->reports)+count($user->reviews))))*100}}%</p>
                    @endif
                  0%
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>حساب الساعه</label>
                  </div>
                  <div class="col-md-6">
                    <p>10$/hr</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>مجموع الاعمال</label>
                  </div>
                  <div class="col-md-6">
                    <p>230</p>
                  </div>
                </div>

                <div class="row" hidden>
                  <div class="col-md-6">
                    <label>الاعمال التي يستطيع ان يقدمها</label>
                  </div>
                  <div class="col-md-6">
                    @foreach ($user->jobs as $job)

                      <p>{{$job->job}}</p>
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('jsSection')

@endsection
