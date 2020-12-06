<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'description', 'total_votes', 'rating', 'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function service()
    {
        return $this->belongsTo(Category::class, 'service_id')->withDefault();
    }

    public function services()
    {
        return $this->belongsToMany(Category::class, 'service_id')->withDefault();
    }

    public function request()
    {
        return $this->hasOne(Request::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

}
