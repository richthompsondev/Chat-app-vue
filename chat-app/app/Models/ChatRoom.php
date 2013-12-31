<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $table = 'chat_rooms';

    public function messages()
    {
       return $this->hasMany('App\Models\ChatMessage');
    }
}
