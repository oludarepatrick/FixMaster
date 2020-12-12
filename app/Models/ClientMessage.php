<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMessage extends Model
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
        return $this->belongsTo(User::class, 'sender_id')->withDefault();
    }

    public function userSentMessages()
    {
        return $this->hasMany(User::class, 'sender_id')->withDefault();
    }

    public function userReceivedMessage()
    {
        return $this->belongsTo(User::class, 'recipient_id')->withDefault();
    }

    public function userReceivedMessages()
    {
        return $this->hasMany(User::class, 'recipient_id')->withDefault();
    }
}
