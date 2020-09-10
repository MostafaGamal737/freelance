<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\chat;
use App\message;
use Auth;
use App\Events\SendMessageEvent;
use Session;

class MessageController extends Controller
{
  public function __construct()
   {
   // Session::put('website', 'Message');
    }

  public function Messages($id)
  {
    Session::put('website', 'Message'); 
   $messages=message::where('chat_id', $id)->get();
   $chat=chat::find($id);
   if (Auth::id()!=$chat->sender_id&&Auth::id()!=$chat->receiver_id&&Auth::user()->role!='مدير'&&Auth::user()->role!='مدير عام') {
     return redirect('Home');
   }

    return view('users/Messages/Messages',compact('messages','chat'));
  }
  public function chats()
  {
    Session::put('website', 'Message'); 
     $chats=chat::where('sender_id',Auth::id())
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
    broadcast(new SendMessageEvent($message->load('user'),$data->chat_id))->toOthers();
  return "sent SuccessedOrders";
  }
public function  GetMessages($id)
{Session::put('website', 'Message'); 
  $allmessages= message::where('chat_id', $id)->with('user')->get();

  return $allmessages;

}

}
