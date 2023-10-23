<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function receive()
    {
        return $this->belongsTo(User::class , 'receive_id');
    }
}
