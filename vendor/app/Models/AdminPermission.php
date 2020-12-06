<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'administrators', 'clients', 'cses', 'location_request', 'payments', 'ratings', 'requests', 'rfqs', 'service_categories', 'technicians', 'tools', 'utilities',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }


}
