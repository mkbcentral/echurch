<?php

namespace App\Http\Controllers;

use App\Models\ChurchEvent;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeOrUnLike($id){
        $event=ChurchEvent::find($id);
        if (!$event) {
            return response()->json([
                "message"=>'Aucun evenemnt'
            ],403);
         }

        $like=$event->likes()->where('user_id',auth()->user()->id)->first();
        if (!$like) {
            Like::create([
                'user_id'=>auth()->user()->id,
                'church_event_id'=>$id
            ]);

            return response()->json([
               "message"=> 'Evenement aimé',
               "status"=>true
            ],200);
        }
        $like->delete();
        return response()->json([
            "message"=>"J'aime pas !",
            "status"=>false
        ],200);
    }
}
