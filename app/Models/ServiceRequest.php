<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'admin_id', 'cse_id', 'technician_id', 'service_id', 'category_id', 'job_reference', 'security_code', 'service_request_status_id', 'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'user_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'admin_id', 'user_id');
    }

    public function cse()
    {
        return $this->hasOne(CSE::class, 'user_id', 'cse_id');
    }

    public function cses()
    {
        return $this->hasMany(CSE::class, 'user_id', 'cse_id');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id', 'user_id');
    }

    public function technicians()
    {
        return $this->hasMany(Technician::class, 'technician_id', 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_id');
    }

    public function serviceRequestDetail()
    {
        return $this->hasOne(ServiceRequestDetail::class, 'service_request_id');
    }

    public function serviceRequestStatus()
    {
        return $this->hasOne(ServiceRequestStatus::class, 'id', 'service_request_status_id');
    }
    
    public function serviceRequestStatuses()
    {
        return $this->belongsToMany(ServiceRequestStatus::class, 'id', 'service_request_status_id');
    }

    public function serviceRequestProgress()
    {
        return $this->hasOne(ServiceRequestProgress::class, 'service_request_id');
    }
    
    public function serviceRequestProgreses()
    {
        return $this->hasMany(ServiceRequestProgress::class, 'service_request_id');
    }

    public function serviceRequestCancellationReason()
    {
        return $this->hasOne(ServiceRequestCanellation::class, 'service_request_id');
    }

    public function serviceRequestCancellationReasons()
    {
        return $this->hasMany(ServiceRequestCanellation::class, 'service_request_id');
    }

    public function rfq()
    {
        return $this->hasOne(RFQ::class, 'service_request_id');
    }

    public function rfqs()
    {
        return $this->hasMany(RFQ::class, 'service_request_id');
    }

    public function toolRequest()
    {
        return $this->hasOne(ToolsRequest::class, 'service_request_id');
    }

    public function toolRequests()
    {
        return $this->hasMany(ToolsRequest::class, 'service_request_id');
    }

    public function receivedPayment()
    {
        return $this->hasOne(ReceivedPayment::class, 'service_request_id');
    }

    public function receivedPayments()
    {
        return $this->hasMany(ReceivedPayment::class, 'service_request_id');
    }

    public function cseTechnicianDisbursedPayment()
    {
        return $this->hasOne(DisbursedPayment::class, 'service_request_id');
    }

    public function cseTechnicianDisbursedPayments()
    {
        return $this->hasMany(DisbursedPayment::class, 'service_request_id');
    }

    
    
     /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeNewRequests($query){
        return $query->where('service_request_status_id', '1')
        ->orderBy('created_at', 'DESC');
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeOngoingRequests($query){
        return $query->where('service_request_status_id', '>', 3)
        ->orderBy('created_at', 'DESC');
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeCompletedRequests($query){
        return $query->where('service_request_status_id', '=', 3)
        ->orderBy('created_at', 'DESC');
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeCancelledRequests($query){
        return $query->where('service_request_status_id', '=', 2)
        ->orderBy('updated_at', 'DESC');
    }
}
