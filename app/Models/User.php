<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',  'password', 'remember_token', 'email_verification_token', 'email_verified_at',	'is_email_verified', 'designation', 'is_active', 'is_deleted', 'login_count',
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

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function adminPermissions()
    {
        return $this->hasOne(AdminPermission::class);
    }
}
