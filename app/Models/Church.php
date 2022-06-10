<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;
    public function preaching(){
        return $this->hasMany(preaching::class);
    }

    public function churchEvents(){
        return $this->hasMany(ChurchEvent::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

}
