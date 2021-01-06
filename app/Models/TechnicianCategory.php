<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianCategory extends Model
{
    use HasFactory;

    public $table = "technician_category";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'technician_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'id')->withTrashed();
    }

    public function technicians()
    {
        return $this->hasMany(Technician::class, 'id')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id')->withTrashed();
    }
}
