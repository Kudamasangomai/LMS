<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    public function consignments()
    {
        return $this->hasMany('App\Models\consignment');
    }

    public function trip()
    {
        return $this->hasMany('App\Models\tripfuel');
    }
    
}
