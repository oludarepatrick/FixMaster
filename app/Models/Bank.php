<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public $table = "banks";

    public $timestamps = false;

    protected $fillable = [
        'name', 'code',
    ];

    public function cse()
    {
        return $this->hasOne(CSE::class, 'bank_id');
    }

    public function cses()
    {
        return $this->hasMany(CSE::class, 'bank_id');
    }

    public function technician()
    {
        return $this->hasOne(CSE::class, 'bank_id');
    }

    public function technicians()
    {
        return $this->hasMany(CSE::class, 'bank_id');
    }
}
