<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSE extends Model
{
    use HasFactory;

    public $table = "cses";

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
        return $this->belongsTo(ServiceRequest::class, 'cse_id', 'user_id')->withTrashed();
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'cse_id', 'user_id')->withTrashed();
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class, 'lga_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id')->withTrashed();
    }

    public function cseCategory()
    {
        return $this->belongsTo(CSECategory::class, 'cse_id');
    }

    public function cseCategories()
    {
        return $this->hasMany(CSECategory::class, 'cse_id');
    }

    public function fullName()
    {
        return $this->hasOne(Name::class, 'created_by');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeActiveCses($query){
        return $query->where('service_request_status_id', '1')
        ->orderBy('created_at', 'DESC');
    }
}
