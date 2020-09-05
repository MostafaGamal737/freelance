<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use session;

class UserController extends Controller
{
  public function __construct()
   {
    session::put('website', 'Not');
     }

    public function Notification(){
      $ntifications=Auth::user()->Notifications;
      Auth::user()->unreadNotifications->markAsRead();
      return $ntifications;
    }
}
