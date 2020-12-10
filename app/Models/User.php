<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',  'password', 'remember_token', 'email_verification_token', 'email_verified_at',	'is_email_verified', 'designation', 'is_active', 'login_count',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
    protected $dates = [
        'current_sign_in', 'last_sign_in'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function fullName()
    {
        return $this->hasOne(Name::class);
    }
    
    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class);
    }

    public function superAdmins()
    {
        return $this->hasMany(SuperAdmin::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function adminPermissions()
    {
        return $this->hasOne(AdminPermission::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
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

    public function scopeActiveAdmin($query, $args){
        return $query->where('id', $args)
        ->select('id', 'email')
        ->with(['admins' => function($query){
            return $query->select('first_name', 'middle_name', 'last_name', 'designation', 'phone_number', 'user_id');
        }])
        ->with('adminPermissions');
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeActiveClients($query){
        return $query->select('id', 'email', 'is_active', 'designation')
        ->with(['clients' => function($query){
            return $query->select('phone_number', 'user_id');
        }])
        ->where('designation', '[CLIENT_ROLE]')
        // ->where('id', '!=', 1)
        ->orderBy('users.created_at', 'ASC');
    }
}
