<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    use HasFactory;
    public function getPlaces()
    {
        return $this->hasMany('App\Models\Place');
    }
}
