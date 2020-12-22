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
        return $this->belongsTo(Lga::class);
    }

}
