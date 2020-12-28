<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQBatch extends Model
{
    use HasFactory;

    public $table = "rfq_batches";

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rfq_id', 'component_name', 'model_number', 'quantity', 'amount'
    ];

    public function rfq()
    {
        return $this->belongsTo(RFQ::class, 'id', 'rfq_id');
    }

    public function rfqs()
    {
        return $this->hasMany(RFQ::class, 'id', 'rfq_id');
    }
    
}
