<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chatRoomId',
        'userId',
        'message'
    ];

    public function ChatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chatRoomId');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
