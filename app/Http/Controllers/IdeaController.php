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

class IdeaController extends Controller
{
    public function ideaIndex(Idea $idea,Trouble $trouble)
    {
        return view('ideas/index')->with(['ideas' => $idea -> get(),'troubles'=>$trouble->get()]);
    }
    
    public function ideaShow(Idea $idea,IdeaComments $comment)
    {
        $fillterdComments=$comment->where('idea_id',$idea->id)->get();
        return view('ideas/show')->with(['idea'=>$idea, 'comments'=> $fillterdComments]);
    }
    
    public function ideaCreate(Tag $tag)
    {
        //dd($tag->id);
        return view('ideas/create')->with(['tags'=>$tag->get()]);
    }
    
    public function ideaSearch(Idea $idea,Request $request)
    {
        $keyword=$request->input('keyword');
        $query=Idea::query();
        if (isset($keyword) && !empty($keyword))
        {
            $query->where('idea_title','LIKE',"%{$keyword}%")
                ->orWhereHas('tag',function ($tag) use ($keyword)
                {
                    $tag->where('name','LIKE',"%{$keyword}%");
                });
        }
        $idea = $query->paginate(5);
        return view('/ideas/search')->with(['ideas'=>$idea,'keyword'=>$keyword]);
    }
    
    public function ideaStore(IdeaRequest $request,Idea $idea)
    {
        $input = $request['idea'];
        //dd($request->all());
        $idea->tag_id = $request['tag'];
        $idea->user_id = Auth::id();
        $idea->fill($input)->save();
        return redirect('/ideas/'.$idea->id);
    }
    
    public function ideaComment(Request $request,IdeaComments $comment)
    {
        $input = $request['comment'];
        $comment->user_id=Auth::id();
        $comment->fill($input)->save();
        return redirect('/ideas/'.$comment->idea_id);
    }
    
    public function ideaEdit(Idea $idea,Tag $tag)
    {
        $this->authorize('update',$idea);
        return view('ideas/edit')->with(['idea'=>$idea,'tags'=>$tag->get()]);
    }
    
    public function ideaUpdate(IdeaRequest $request,Idea $idea)
    {
        $input = $request['idea'];
        $idea->tag_id = $request['tag'];
        $idea->fill($input)->save();
        return redirect('/ideas/'.$idea->id);
    }
    
    public function ideaDelete(Idea $idea)
    {
        $this->authorize('delete',$idea);
        $idea->delete();
        return redirect('/');
    }
    
    public function ideaCommentDelete(IdeaComments $comment)
    {
        $id=$comment->idea_id;
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect('/ideas/'.$id);
    }
    
}
