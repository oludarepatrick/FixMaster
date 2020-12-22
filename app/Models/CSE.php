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
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withDefault();
    }

    public function request()
    {
        return $this->belongsTo(ServiceRequest::class, 'cse_id', 'user_id');
    }

    public function requests()
    {
        return $this->hasMany(ServiceRequest::class, 'cse_id', 'user_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id');
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

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
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
