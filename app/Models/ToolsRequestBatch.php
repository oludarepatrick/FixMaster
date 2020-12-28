<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsRequestBatch extends Model
{
    use HasFactory;

    public $table = "tool_request_batches";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tool_request_id', 'tool_id', 'quantity', 
    ];
}
