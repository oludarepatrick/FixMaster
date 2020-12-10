<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
