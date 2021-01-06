<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequestProgress extends Model
{
    use HasFactory;

    public $table = "service_request_progresses";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'service_request_id', 'service_request_status_id', 
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
        return $this->belongsTo(ServiceRequest::class, 'service_request_id')->withTrashed();
    }

    public function serviceRequestStatus()
    {
        return $this->hasOne(ServiceRequestStatus::class, 'id', 'service_request_status_id')->withTrashed();
    }
    
    public function serviceRequestStatuses()
    {
        return $this->belongsToMany(ServiceRequestStatus::class, 'id', 'service_request_status_id')->withTrashed();
    }

}
