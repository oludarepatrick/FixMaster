<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisbursedPayment extends Model
{
    use HasFactory;

    public $table = "disbursed_payments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'recipient_id', 'service_request_id', 'payment_mode', 'payment_reference', 'amount', 'payment_date', 'comment'	
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id')->withTrashed();
    }

    public function recipients()
    {
        return $this->hasMany(User::class, 'recipient_id')->withTrashed();
    }

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_request_id');
    }

}

