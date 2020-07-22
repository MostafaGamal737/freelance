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

      $user=user::find(1);
      $message1=message::where('user_id',$sender_id)->where('recever_id', $receiver_id)->pluck('id');
      $message2=message::where('recever_id',$sender_id)->where('user_id', $receiver_id)->pluck('id');
      $message12=array_merge($message1->toArray(),$message2->toArray());
      asort ($message12);
      foreach ($message12 as $message) {
        $messages[]=message::find($message);
      }
      return view('admin\chats\messages',compact('messages'));
    }
    public function AddMessage(Request $data){

         $message=new message();
         $message->message=$data->message;
         $message->recever_id=$data->recever_id;
         $message->chat_id=$data->chat_id;
         $message->user_id=Auth::id();
         $message->save();
         broadcast(new SendMessageEvent($message));
       return ['status'=>'success'];
    }
}
