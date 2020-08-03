<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\message;
use Auth;
use App\Events\SendMessageEvent;
class ChatController extends Controller
{
  public function AddMessage(Request $data){
       
       $message=new message();
       $message->message=$data->message;
       $message->recever_id=$data->recever_id;
       $message->chat_id=$data->chat_id;
       $message->user_id=Auth::id();
       $message->save();
       broadcast(new SendMessageEvent($message));
     return response(['status'=>'success','message'=>'message sent successfully']);
  }

  public function GetMessages()
  {
    if (isset($_GET['sender_id'])&&isset($_GET['receiver_id'])) {
    $sender_id=$_GET['sender_id'];
    $receiver_id=$_GET['receiver_id'];
    $message1=message::where('user_id',$sender_id)->where('recever_id', $receiver_id)->pluck('id');
    $message2=message::where('recever_id',$sender_id)->where('user_id', $receiver_id)->pluck('id');
    $message12=array_merge($message1->toArray(),$message2->toArray());
    asort ($message12);
    foreach ($message12 as $message) {
      $messages[]=message::find($message);
    }
    return response(['data'=>['messages'=>$messages]]);
  }
else {
  return response(['error'=>'some thing went wrong']);
}
}

}
