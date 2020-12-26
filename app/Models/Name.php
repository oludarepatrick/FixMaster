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
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }

    public function cse()
    {
        return $this->belongsTo(CSE::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(CSE::class, 'user_id');
    }
}
