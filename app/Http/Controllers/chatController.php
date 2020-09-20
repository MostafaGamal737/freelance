<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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


   public function action(Request $data_search)
   {
     $output='';
     if ($data_search->ajax()) {
       $query=$data_search->get('query');
       if ($query!='') {
         $data=chat::where('id','like','%'.$query.'%')
         ->orwhere('sender_name','like','%'.$query.'%')
         ->orwhere('receiver_name','like','%'.$query.'%')
         ->get();
       }
       else {
         $data=chat::orderBy('id', 'DESC')->get();
       }
       $total_row=count($data);
     }
     if ($total_row>0) {
       foreach ($data as $row) {
         $output.='
          <tr>
          <td>'.$row->id.'</td>
          <td>'.User::find($row->sender_id)->name.'</td>
          <td>'.User::find($row->receiver_id)->name.'</td>
          <td>'.$row->chat.'</td>
          <td><a href=../Dashboard/Chats/Chat/'.$row->id.' class="btn btn-primary">مشاهدة</a>
          <a href=../Home/chats/'.$row->id.' class="btn btn-info">محادثه</a>
          </td>

          </tr>
         ';
       }
     }
     else {
       $output='
       <tr>
       <td align="center" colspan="5">
      لا يوجد نتائج
       </td>
       </tr>
       ';
     }
     $data=array(
       'table_data'=>$output,
       'total_data'=>$total_row,
     );
     echo json_encode($data);
   }
}
//<td ><a href="{{asset('Dashboard\Chats\Chat')}}\{{$chat->id}}" class="btn btn-primary">مشاهدة</a><a href="DeleteUser/" class="btn btn-danger">حذف</a></td>
