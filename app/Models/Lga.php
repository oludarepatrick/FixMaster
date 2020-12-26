<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    public $table = "lgas";

    public $timestamps = false;

    protected $fillable = [
        'state_id', 'name'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'state_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'state_id');
    }

    public function cse()
    {
        return $this->hasOne(Client::class, 'lga_id');
    }

    public function cses()
    {
        return $this->hasMany(Client::class, 'lga_id');
    }

}
