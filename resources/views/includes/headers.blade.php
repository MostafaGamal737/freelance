<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title> @yield('title') </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/main.css')}}" rel="stylesheet">
    @yield('css')
  <body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <div class="app-header header-shadow">
        <div class="app-header__logo">
          <img src="{{asset('admin\css\assets\images\logo-inverse.png')}}"style="width:200px;height:50px">
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>    <div class="app-header__content">
          <div class="app-header-left">
           <h1>تعميد</h1>
                    </div>
            <div class="app-header-right">
              <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                  <div class="widget-content-wrapper">
                    <div class="widget-content-left">

                    </div>
                    <div class="widget-content-left  ml-3 header-user-info">
                      <div class="widget-heading">
                       @if(Auth::user()->role=='مدير عام')
                       <a href="{{asset('Dashboard/Users/Update')}}/{{Auth::id()}}">{{Auth::user()->name}}</a> 
                       @else
                       {{Auth::user()->name}}
                       @endif
                      </div>
                      <div class="widget-subheading">

                      </div>
                    </div>
                    <div class="widget-content-right header-user-info ml-3">
                      <a href="{{asset('Logout')}}" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>        </div>
            </div>
          </div>
