<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
  public function __construct()
   {
   // session::put('website', 'Not');
     }

    public function Notification(){
      session::put('website', 'Not');
      $ntifications=Auth::user()->Notifications;
      Auth::user()->unreadNotifications->markAsRead();
      return Auth::user()->unreadNotifications;
    }
}
