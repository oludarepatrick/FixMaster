<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',  'state_id', 'lga_id', 'profession_id', 'town', 'first_name', 'middle_name', 'last_name', 'phone_number', 'gender', 'avatar', 'full_address'
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
        return $this->hasOne(Request::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function fullName()
    {
        return $this->hasOne(Name::class, 'user_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

}
