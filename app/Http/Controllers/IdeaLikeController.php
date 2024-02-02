<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Idea;
use App\Models\IdeaLike;


class IdeaLikeController extends Controller
{
    public function like(Idea $idea,Request $request){
        $like=New IdeaLike();
        
        $like->idea_id = $idea->id;
        $like->user_id = Auth::user()->id;
        //dd($like);
        $like->save();
        return back();
    }
    
    public function unlike(Idea $idea,Request $request){
        $user=Auth::user()->id;
        $like=IdeaLike::where('idea_id',$idea->id)->where('user_id',$user)->first();
        //dd($like);
        $like->delete();
        return back();
    }    
}
