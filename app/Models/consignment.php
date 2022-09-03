<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consignment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver','drivername');
    }

    public function fleet()
    {
        return $this->belongsTo('App\Models\Fleet','fleetno');
    }
    public function closedbyf()
    {
        return $this->belongsTo('App\Models\User','closedby');
    }

    public function accountuser()
    {
        return $this->belongsTo('App\Models\User','accuserclosedby');
    }
  
}
