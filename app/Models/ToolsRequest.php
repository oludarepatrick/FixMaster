<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsRequest extends Model
{
    use HasFactory;

    public $table = "tool_requests";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requested_by', 'approved_by', 'service_request_id', 'batch_number', 'status', 'created_at', 'updated_at'
    ];
}
