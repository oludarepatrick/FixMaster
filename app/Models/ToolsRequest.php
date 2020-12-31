<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsRequest extends Model
{
    use HasFactory;

    public $table = "tool_requests";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requested_by', 'approved_by', 'service_request_id', 'batch_number', 'status', 'is_returned', 'created_at', 'updated_at'
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by')->withDefault();
    }

    public function requesters()
    {
        return $this->hasMany(User::class, 'requested_by')->withDefault();
    }
    
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by')->withDefault();
    }

    public function approvers()
    {
        return $this->hasMany(User::class, 'approved_by')->withDefault();
    }

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_request_id');
    }

    public function toolRequestBatch()
    {
        return $this->hasOne(ToolsRequestBatch::class, 'tool_request_id');
    }

    public function toolRequestBatches()
    {
        return $this->hasMany(ToolsRequestBatch::class, 'tool_request_id');
    }
}
