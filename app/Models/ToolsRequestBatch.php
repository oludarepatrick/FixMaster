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

    public function toolRequest()
    {
        return $this->belongsTo(ToolsRequest::class, 'id', 'tool_request_id');
    }

    public function toolRequests()
    {
        return $this->hasMany(ToolsRequest::class, 'id', 'tool_request_id');
    }

    public function tool()
    {
        return $this->belongsTo(ToolsInventory::class, 'tool_id', 'id');
    }

    public function tools()
    {
        return $this->hasMany(ToolsInventory::class, 'tool_id', 'id');
    }
}
