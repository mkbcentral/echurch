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
    
}
