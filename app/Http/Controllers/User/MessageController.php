<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\chat;
use App\message;
use Auth;
use App\Events\SendMessageEvent;
class MessageController extends Controller
{
  public function Messages($id)
  {
   $messages=message::where('chat_id', $id)->get();
   $chat=chat::find($id);
   if (Auth::id()!=$chat->sender_id&&Auth::id()!=$chat->receiver_id&&Auth::user()->role!='مدير') {
     return redirect('Home');
   }

    return view('users/Messages/Messages',compact('messages','chat'));
  }
  public function chats()
  {  $chats=chat::where('sender_id',Auth::id())
    ->orwhere('receiver_id',Auth::id())->with('messages')->get();
      return view('users/Messages/chats',compact('chats'));
  }
  public function sendmessage(Request $data)
  {
    $message=new message();
    $message->message=$data->message;
    $message->chat_id=$data->chat_id;
    $message->user_id=Auth::id();
    $message->save();
    broadcast(new SendMessageEvent($message,$data->chat_id));
  return "sent SuccessedOrders";
  }
public function  GetMessages($id)
{
  $allmessages= message::where('chat_id', $id)->with('user')->get();

  return $allmessages;

}

}
