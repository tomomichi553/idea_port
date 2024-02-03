<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Idea;
use App\Models\IdeaLike;


class IdeaLikeController extends Controller
{
   public function like(Request $request)
    {
        $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
        $idea_id = $request->post_id; // 投稿のidを取得
    
        // すでにいいねがされているか判定するためにlikesテーブルから1件取得
        $already_liked = IdeaLike::where('user_id', $user_id)->where('idea_id', $idea_id)->first(); 
    
        if (!$already_liked) { 
            $idealike = new IdeaLike; // Likeクラスのインスタンスを作成
            $idealike->idea_id = $idea_id;
            $idealike->user_id = $user_id;
            $idealike->save();
        } else {
            // 既にいいねしてたらdelete 
            IdeaLike::where('idea_id', $idea_id)->where('user_id', $user_id)->delete();
        }
        // 投稿のいいね数を取得
        $idea_likes_count =Idea::find($idea_id)->idea_likes()->count();
        //dd($idea_likes_count);
        $param = [
            'idea_likes_count' => $idea_likes_count,
        ];
        return response()->json($param); // JSONデータをjQueryに返す
    }
}
