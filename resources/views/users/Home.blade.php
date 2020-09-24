@extends('users.layout.master')
@section('title')
  الصفحه الرئيسيه
@endsection
@section('body')

      <div class="container" id="home-container">
          <div class="row d-flex justify-content-center">
              <!-- في حاله ان نوع الحساب لطلب الخدمات-->
              @if (Auth::user()->role=='طالب خدمه')
              <h2 class="text-center">!لقد قمت بالتسجيل بنجاح يمكنك طلب خدمه الان</h2>
              @else
              <h2 class="text-center">!لقد قمت بالتسجيل بنجاح يمكنك انجاز مهمه الان</h2>
              @endif
              <!--في حاله ان نوع الحساب تنفيذ خدمات
              <h2 class="text-center">!لقد قمت بالتسجيل بنجاح يمكنك تنفيذ خدمه الان</h2>
               -->
          </div>
          <div class="row d-flex justify-content-center">
              <img src="images/home-img.svg" class="img-fluid" alt="Responsive image" id="home-img" >
          </div>
          <!-- في حاله ان نوع الحساب لطلب الخدمات-->
          <div class="row d-flex justify-content-center">
            @if (Auth::user()->role=='طالب خدمه')
              <a href="{{asset('Home/MakeOrder')}}" type="submit" class="btn btn-success " id="btn-submit">طلب خدمه</a>
          @else
            <a href="{{asset('Home/ExcuteOrder')}}" type="submit" class="btn btn-success " id="btn-submit">انجاز مهمه</a>

            @endif

              <!-- في حاله ان نوع حساب الشخص لانجاز المهام
              -->
          </div>
      </div>
@endsection
