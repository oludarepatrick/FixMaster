<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequestStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'can_delete', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function serviceRequest()
    {
        return $this->hasOne(ServiceRequest::class, 'service_request_status_id')->withTrashed();
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_request_status_id')->withTrashed();
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeRequestUpdateStatuses($query){
        return $query->select('id', 'name')
        ->where('id', '>', '4');
    }
    

}
