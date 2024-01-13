<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IdeaRequest;
use App\Http\Requests\TroubleRequest;
use App\Http\Controllers\Post;
use App\Models\Idea;
use App\Models\Trouble;
use App\Models\Tag;
use App\Models\IdeaComments;
use App\Models\TroubleComments;
use Cloudinary;

class TroubleController extends Controller
{
    public function troubleCreate(Tag $tag)
    {
        return view('troubles/create')->with(['tags'=>$tag->get()]);
    }
    
    public function troubleSearch(Trouble $trouble,Request $request,Tag $tag){
        $keyword=$request->input('keyword');
        $tags=$request->input('tag',[]);
        
        $query=Trouble::query();
        if (isset($keyword) && !empty($keyword))
        {
            $query->where('body','LIKE',"%{$keyword}%")
            ->orWhereHas('tag',function ($tag) use ($keyword){
                $tag->where('name','LIKE',"%{$keyword}%");
            });
        }
        
        if(!empty($tags))
        {
            $query->whereHas('tag',function($query) use ($tags){
                $query->whereIn('name',$tags);
            });
        }
        
        $Trouble = $query->paginate(5);
        return view('/troubles/search')->with(['troubles'=>$Trouble,'keyword'=>$keyword,'tags'=>$tag->get()]);
    }
    
    public function troubleShow(Trouble $trouble,TroubleComments $comment)
    {
        $fillterdComments=$comment->where('trouble_id',$trouble->id)->get();
        return view('troubles/show')->with(['trouble'=>$trouble,'comments'=>$fillterdComments]);
    }
    
    public function troubleStore(TroubleRequest $request,Trouble $trouble)
    {
        $input = $request['trouble'];
        if($request->file('image')){
            $image_url=Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['img_url'=>$image_url];
        }
        $trouble->tag_id = $request['tag'];
        $trouble->user_id = Auth::id();
        $trouble->fill($input)->save();
        return redirect('/troubles/'.$trouble->id);
    }
    
    public function troubleComment(Request $request,TroubleComments $comment)
    {
        $input = $request['comment'];
        $comment->user_id=Auth::id();
        $comment->fill($input)->save();
        return redirect('/troubles/'.$comment->trouble_id);
    }
    
    public function troubleEdit(Trouble $trouble,Tag $tag)
    {
        $this->authorize('update',$trouble);
        return view('troubles/edit')->with(['trouble'=>$trouble,'tags'=>$tag->get()]); 
    }
    
    public function troubleUpdate(TroubleRequest $request,Trouble $trouble)
    {
        $input=$request['trouble'];
        if($request->file('image')){
            $image_url=Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['img_url'=>$image_url];
        }
        $trouble->tag_id=$request['tag'];
        $trouble->fill($input)->save();
        return redirect('/troubles/'.$trouble->id);
    }
    
    public function troubleDelete(Trouble $trouble)
    {
        $this->authorize('update',$trouble);
        $trouble->delete();
        return redirect('/');
    }
    
    public function troubleCommentDelete(TroubleComments $comment)
    {
        $id=$comment->trouble_id;
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect('/troubles/'.$id);
    }
}
