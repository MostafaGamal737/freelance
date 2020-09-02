<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function Notification(){
      $ntifications=Auth::user()->Notifications;
      Auth::user()->unreadNotifications->markAsRead();
      return $ntifications;
    }
}
