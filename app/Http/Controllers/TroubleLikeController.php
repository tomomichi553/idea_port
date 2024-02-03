<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trouble;
use App\Models\TroubleLike;

class TroubleLikeController extends Controller
{
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
        $trouble_id = $request->post_id; // 投稿のidを取得
        
        // すでにいいねがされているか判定するためにlikesテーブルから1件取得
        $already_liked = TroubleLike::where('user_id', $user_id)->where('trouble_id', $trouble_id)->first(); 
        //dd($trouble_id);
        if (!$already_liked) { 
            $troublelike = new TroubleLike; // Likeクラスのインスタンスを作成
            $troublelike->trouble_id = $trouble_id;
            $troublelike->user_id = $user_id;
            $troublelike->save();
        } else {
            // 既にいいねしてたらdelete 
            TroubleLike::where('trouble_id', $trouble_id)->where('user_id', $user_id)->delete();
        }
        // 投稿のいいね数を取得
        $trouble_likes_count = Trouble::find($trouble_id)->trouble_likes()->count();
        $param = [
            'trouble_likes_count' => $trouble_likes_count,
        ];
        return response()->json($param); // JSONデータをjQueryに返す
    }
}
