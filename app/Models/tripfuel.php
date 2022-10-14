<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tripfuel extends Model
{
    use HasFactory;
        // The attributes that are mass assignable.
    
    protected $fillable = [      

        /*'driver_id',
        'fleet_id' ,
        'openingkm',
        'fuelbeforetrip',
        'user_id'*/
    ];

    public function tripdriver()
    {
        return $this->belongsTo('App\Models\Driver','driver_id');
    }
    public function tripfleet()
    {
        return $this->belongsTo('App\Models\Fleet','fleet_id');
    }
    // public function consignment()
    // {
    //     return $this->hasMany('App\Models\consignment');
    // }
}
