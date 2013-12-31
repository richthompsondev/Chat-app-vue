<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms(Request $request)
    {
          return ChatRoom::all();
    }

    public function messages(Request $request, $roomid)
    {
      return ChatMessage::where('chat_room_id',$roomid)
          ->with('user')
          ->orderBy('created_at','DESC')
          ->get();
    }

    public function newMessage(Request $request, $roomid)
    {
       // $user = User::find(Auth::id());

       $newMessage = new ChatMessage() ;
       $newMessage->user_id = Auth::id();
       $newMessage->chat_room_id = $roomid;
       $newMessage->message = $request->message;

     $result = $newMessage->save();

       // event(new Message($request->input('username'),$request->input('message')));
        event(new NewChatMessage($newMessage));

     //  $result = ChatMessage::create($newMessage);

           if ($result){

               return $newMessage;
           }

    }
}
