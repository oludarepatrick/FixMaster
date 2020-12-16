<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationAndBrowserInfo extends Model
{
    use HasFactory;

    public $table = "location_and_browser_infos";
    
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'ip', 'country_name', 'country_code', 'region_code', 'region_name', 'city_name', 'zip_code', 'iso_code', 'postal_code', 'latitude', 'longitude', 'metro_code', 'area_code', 'browser_name', 'browser_version', 'device_operating_system', 'device_operating_system_version', 'languages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
