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
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function serviceRequest()
    {
        return $this->hasOne(ServiceRequest::class, 'service_request_status_id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_request_status_id');
    }

}
