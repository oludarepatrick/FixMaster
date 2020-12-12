<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $table = "states";

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function lgas()
    {
        return $this->hasMany(Lga::class, 'state_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'state_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'state_id');
    }

}
