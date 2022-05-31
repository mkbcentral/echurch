<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchEvent extends Model
{
    use HasFactory;
    public function church(){
        return $this->belongsTo(Church::class);
    }
    protected $casts=[
        'started_at_date'=>'datetime',
        'finished_at_date'=>'datetime',
        'started_at_time'=>'datetime',
        'finished_at_time'=>'datetime'
    ];

    public function getStartedAtDateAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }
    public function getFinishedAtDateAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }

   
}
