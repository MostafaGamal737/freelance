<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class NotificationController extends Controller
{
    public function GetNotifications()
    {
        $Notifications=Auth::user()->Notifications()->orderBy('id', 'desc')->take(10)->get('data');
        if(count($Notifications)>0)
        {
            return response(['true'=>$Notifications]);
        }
        return response(['false'=>'ليس لديك اشعارات']);
    }
    public function GetUnreadNotificationsCount()
    {
        $Notifications=count(Auth::user()->unreadNotifications()->orderBy('id', 'desc')->take(10)->get());
        if($Notifications>0)
        {
            return response(['true'=>$Notifications]);
        }
        return response(['false'=>'تم قراءة كل الاشعارات']);
    }
}
