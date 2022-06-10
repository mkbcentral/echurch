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
        return Carbon::parse($value)->toFormattedDateString('d/m/Y');
    }
    public function getFinishedAtDateAttribute($value){
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isSelfLike($id){
        $event=ChurchEvent::find($id);
        $data=$event->likes()->where('user_id',auth()->user()->id)->get();
        if ($data->isEmpty()) {
            return false;
        }else{
            return true;
        }
    }


}
