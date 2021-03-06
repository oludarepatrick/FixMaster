<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'service_id', 'standard_fee', 'urgent_fee', 'ooh_fee', 'description', 'url', 'image', 'total_votes', 'rating', 'is_active', 'updated_at',
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
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_id');
    }

    public function request()
    {
        return $this->hasOne(ServiceRequest::class, 'category_id', 'id' );
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'category_id', 'id' );
    }

    public function category()
    {
        return $this->belongsTo(CSECategory::class, 'category_id');
    }

    public function categories()
    {
        return $this->hasMany(CSECategory::class, 'category_id');
    }

}
