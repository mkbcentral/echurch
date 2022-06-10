<?php

namespace App\Http\Controllers;

use App\Models\ChurchEvent;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id){
        $event=ChurchEvent::find($id);

        if (!$event) {
           return response()->json([
            "message"=>'Aucun evenemnt'
           ],403);
        } else {
            return response()->json([
                'event'=>$event->comments()->with('user:id,name,avatar')->get()
            ],200);
        }

    }

    public function store(Request $request,$id){
        $event=ChurchEvent::find($id);

        if (!$event) {
           return response()->json([
            "message"=>'Aucun evenemnt'
           ],403);
        } else {
            $attrs=$request->validate([
                'comment'=>'required'
            ]);
            Comment::create([
                'comment'=>$attrs['comment'],
                'user_id'=>auth()->user()->id,
                'church_event_id'=>$id
            ]);
            return response()->json([
                'message'=>'Vous venez de commenter maintenant !'
            ],200);
        }

    }

    public function update(Request $request,$id){
        $comment=Comment::find($id);

        if (!$comment) {
            return response()->json([
                'Aucun commentaire'
            ],403);
        }
        if ($comment->user_id != auth()->user()->id) {
            return response()->json([
                'Action non autorisée'
            ],403);
        }

        $attrs=$request->validate([
            'comment'=>'required'
        ]);

        $comment->update([
            'comment'=>$attrs['comment'],
        ]);
        return response()->json([
            'commentaire modifié'
        ],200);


    }

    public function delete($id){
        $comment=Comment::find($id);

        if (!$comment) {
            return response()->json([
                "message"=> 'Aucun commentaire'
            ],403);
        }

        if ($comment->user_id != auth()->user()->id) {
            return response()->json([
                "message"=> 'Action non autorisée'
            ],403);
        }
        $comment->delete();
        return response()->json([
            "message"=>'commentaire retiré !'
        ],200);

    }
}
