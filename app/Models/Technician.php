<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    public $table = "technicians";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'created_by', 'franchise_id', 'state_id', 'lga_id', 'town', 'bank_id', 'tag_id', 'first_name', 'middle_name', 'last_name', 'gender', 'phone_number', 'other_phone_number', 'account_number', 'rating', 'avatar', 'full_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function request()
    {
        return $this->belongsTo(ServiceRequest::class, 'technician_id', 'user_id')->withTrashed();
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'technician_id', 'user_id')->withTrashed();
    }

    public function fullName()
    {
        return $this->hasOne(Name::class, 'user_id');
    }

    public function technicianCategory()
    {
        return $this->belongsTo(TechnicianCategory::class, 'technician_id');
    }

    public function technicianCategories()
    {
        return $this->hasMany(TechnicianCategory::class, 'technician_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
