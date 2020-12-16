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
        'user_id', 'admin_id', 'cse_id', 'technician_id', 'service_id', 'category_id', 'job_reference', 'security_code', 'client_project_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id')->withDefault();
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'admin_id')->withDefault();
    }

    public function cse()
    {
        return $this->hasOne(CSE::class, 'user_id', 'cse_id')->withDefault();
    }

    public function cses()
    {
        return $this->hasMany(CSE::class, 'cse_id')->withDefault();
    }

    public function technician()
    {
        return $this->belongsTo(CSE::class, 'cse_id')->withDefault();
    }

    public function technicians()
    {
        return $this->hasMany(CSE::class, 'cse_id')->withDefault();
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
    
}
