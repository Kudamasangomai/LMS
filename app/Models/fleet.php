<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fleet extends Model
{
    use HasFactory;
    public function consignments()
    {
        return $this->hasMany('App\Models\consignment');
    }

    public function trips()
    {
        return $this->hasMany('App\Models\tripfuel');
    }
}
