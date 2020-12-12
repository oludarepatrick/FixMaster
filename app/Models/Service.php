<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'is_active', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function request()
    {
        return $this->hasOne(ServiceRequest::class);
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active services  
    public function scopeActiveServices($query){
        return $query->select('id', 'name', 'is_active')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC');
    }

}
