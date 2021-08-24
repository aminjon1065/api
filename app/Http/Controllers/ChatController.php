<?php

namespace App\Http\Controllers;

use App\Events\Hello;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    public function rooms()
    {
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomId)
    {
        return ChatMessage::with('user')->where('chatRoomId', $roomId)->orderBy('created_at', 'ASC')->get();
    }

    public function newMessage(Request $request, $roomId)
    {
        $newMessage = new ChatMessage;
        $newMessage->userId = Auth::id();
        $newMessage->chatRoomId = $roomId;
        $newMessage->message = $request->input('newMessage');
        $newMessage->save();
        $user = Auth::user();
        event(new Hello($newMessage))->toOthers();
        return $newMessage;
    }
}
