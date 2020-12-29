<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    use HasFactory;

    public $table = "rfqs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'issued_by', 'client_id', 'service_request_id', 'batch_number', 'invoice_number', 'status', 'accepted', 'total_amount', 'created_at', 'updated_at'

    ];

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by')->withDefault();
    }

    public function issuers()
    {
        return $this->hasMany(User::class, 'issued_by')->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id')->withDefault();
    }

    public function clients()
    {
        return $this->hasMany(User::class, 'client_id')->withDefault();
    }

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_request_id');
    }

    public function rfqBatch()
    {
        return $this->hasOne(RFQBatch::class, 'rfq_id');
    }

    public function rfqBatches()
    {
        return $this->hasMany(RFQBatch::class, 'rfq_id');
    }

    public function rfqSupplier()
    {
        return $this->hasOne(RFQSupplier::class, 'rfq_id');
    }

    public function rfqSupplies()
    {
        return $this->hasMany(RFQSupplier::class, 'rfq_id');
    }
}
