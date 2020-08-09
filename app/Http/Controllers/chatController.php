<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\message;
use App\chat;
use Auth;
use session;

use App\Events\SendMessageEvent;
class chatController extends Controller
{
    public function GetMessages($chat_id)
    {
       session::put('active', 'chat');
      $messages=message::where('chat_id', $chat_id)->with('user')->get();
      return view('admin/chats/messages',compact('messages'));
    }

   public function findChat()
   {
     $chat= new chat();
     return $chat->findChat(2,1);
   }

}
