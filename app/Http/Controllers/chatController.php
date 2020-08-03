<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\message;
use App\chat;
use Auth;
use App\Events\SendMessageEvent;
class chatController extends Controller
{
    public function GetMessages($sender_id,$receiver_id)
    {
       session::put('active', 'chat');
      $messages=[];
      $message1=message::where('user_id',$sender_id)->where('recever_id', $receiver_id)->pluck('id');
      $message2=message::where('recever_id',$sender_id)->where('user_id', $receiver_id)->pluck('id');
      $message12=array_merge($message1->toArray(),$message2->toArray());
      asort ($message12);
      foreach ($message12 as $message) {
        $messages[]=message::find($message);
      }
      return view('admin\chats\messages',compact('messages'));
    }


}
