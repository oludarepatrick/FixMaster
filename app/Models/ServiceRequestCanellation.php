<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequestCanellation extends Model
{
    use HasFactory;

    public $table = "service_request_cancellation_reasons";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'service_request_id', 'reason', 
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
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }
}
