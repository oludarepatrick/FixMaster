<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'first_name', 'middle_name', 'last_name', 'phone_number', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
