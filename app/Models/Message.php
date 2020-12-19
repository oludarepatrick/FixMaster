<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'recipient_id', 'subject', 'body', 'is_read',     
    ];

    public function userSentMessage()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function userSentMessages()
    {
        return $this->hasMany(User::class, 'sender_id');
    }

    public function userReceivedMessage()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function userReceivedMessages()
    {
        return $this->hasMany(User::class, 'recipient_id');
    }
}
