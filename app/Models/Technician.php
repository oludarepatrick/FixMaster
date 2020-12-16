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
        'user_id', 'franchise_id', 'state_id', 'lga_id', 'town', 'bank_id', 'tag_id', 'first_name', 'middle_name', 'last_name',  'gender', 'phone_number', 'other_phone_number', 'account_number', 'rating', 'avatar', 'full_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function request()
    {
        return $this->hasOne(ServiceRequest::class);
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
