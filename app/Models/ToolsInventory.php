<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToolsInventory extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "tool_inventories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'quantity', 'available', 'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function toolRequestBatch()
    {
        return $this->hasOne(ToolsRequestBatch::class, 'tool_id', 'id');
    }

    public function toolRequestBatches()
    {
        return $this->hasMany(ToolsRequestBatch::class, 'tool_id', 'id');
    }
    
    /** 
     * Scope a query to only include active banches
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */    
    //Function to return all active clients  
    public function scopeAvalaibleTools($query){
        return $query->select('id', 'name')
        ->where('available', '>', '0');
    }
}
