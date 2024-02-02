<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trouble;
use App\Models\TroubleLike;

class TroubleLikeController extends Controller
{
    public function like(Trouble $trouble,Request $request){
        $like=New TroubleLike();
        
        $like->trouble_id = $trouble->id;
        $like->user_id = Auth::user()->id;
        //dd($like);
        $like->save();
        return back();
    }
    
    public function unlike(Trouble $trouble,Request $request){
        $user=Auth::user()->id;
        $like=TroubleLike::where('trouble_id',$trouble->id)->where('user_id',$user)->first();
        //dd($like);
        $like->delete();
        return back();
    }    
}
