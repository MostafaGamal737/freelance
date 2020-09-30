<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\order;
class NotificationController extends Controller
{
    public function GetNotifications()
    {
        $Notifications=Auth::user()->Notifications()->orderBy('id', 'desc')->get();
        if(count($Notifications)>0)
        {
            return response(['result'=>true,'notifications'=>$Notifications],200);
        }
        return response(['false'=>'ليس لديك اشعارات'],500);
    }
    public function GetUnreadNotificationsCount()
    {
        $Notifications=count(Auth::user()->unreadNotifications()->orderBy('id', 'desc')->paginate(10));
        if($Notifications>0)
        {
            return response(['result'=>true,'Notificationscount'=>$Notifications],200);
        }
        return response(['false'=>'تم قراءة كل الاشعارات'],500);
    }
    public function Notification($id)
    {
        $notification=Auth::user()->unreadNotifications()->where('id',$id)->first();
        if (!empty($notification)) {


        $order=order::find($notification->data['id']);
        $notification->markAsRead();
        return response(['result'=>true,'message'=>'تم قراءة الاشعار','order'=>$order],200);
}
else {
    return response(['false'=>'تم قراءة كل الاشعارات'],500);
}
    }

}
