<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\message;
use App\chat;
use Auth;
use Carbon\Carbon;
use App\Events\SendMessageEvent;
class ChatController extends Controller
{
  public function AddMessage(Request $data){

       $message=new message();
       $message->message=$data->message;
      // $message->recever_id=$data->recever_id;
       $message->chat_id=$data->chat_id;
       $message->user_id=Auth::id();
       $message->save();
       broadcast(new SendMessageEvent($message->load('user'),$data->chat_id))->toOthers();
     return response(['status'=>'success','message'=>'message sent successfully']);
  }

  public function GetMessages()
  {

    if (isset($_GET['chat_id'])) {
      $chat=chat::find($_GET['chat_id']);
      if (Auth::id()==$chat->sender_id||Auth::id()==$chat->receiver_id||Auth::user()->role=='مدير'||Auth::user()->role=='مدير عام')
       {
      $messages=message::where('chat_id', $_GET['chat_id'])->orderBy('id','DESC')->with('user')->paginate(10);
      foreach($messages as $message)
      {
        if((Auth::id()!=$message->user_id&&Auth::user()->role=='منفذ خدمات')||(Auth::id()!=$message->user_id&&Auth::user()->role=='طالب خدمه'))
        {
          $message->read_at=Carbon::now();
          $message->save();
        }
        
      }
      return response(['status'=>'true','messages'=>$messages]);
  }
else {
  return response(['هناك خطْ']);
}
}
else {
  return response(['هناك خطْ']);
}

}
      public function GetMyChats()
      {
        $chats=chat::where('sender_id',Auth::id())
        ->orwhere('receiver_id',Auth::id())->with('messages')->get();
        if (count($chats)>0) {
          foreach($chats as $key=>$chat){
            $UnreadMessages=0;
            $messages=$chat->messages;
            foreach($messages as $message){
            if(Auth::id()!=$message->user_id&&$message->read_at==null){
              $UnreadMessages+=1;
             }
             
            }
            $chats[$key]['UnreadMessages']=$UnreadMessages;
            $chats[$key]['end_date']=$chat->order->end_time;
           }
            return response(['chats'=>$chats]);
        }
        else {
    return response(['response'=>'ليس لديك محادثات']);
          }
      }

}
