<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQSupplier extends Model
{
    use HasFactory;

    public $table = "rfq_suppliers";

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rfq_id', 'name', 'devlivery_fee', 'delivery_time'
    ];

    public function rfq()
    {
        return $this->hasOne(RFQ::class, 'rfq_id');
    }

    public function rfqs()
    {
        return $this->hasMany(RFQ::class, 'rfq_id');
    }


}
