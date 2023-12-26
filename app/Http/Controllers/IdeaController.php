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

class IdeaController extends Controller
{
    public function ideaIndex(Idea $idea,Trouble $trouble)
    {
        return view('ideas/index')->with(['ideas' => $idea -> get(),'troubles'=>$trouble->get()]);
    }
    
    public function ideaShow(Idea $idea)
    {
        return view('ideas/show')->with(['idea'=>$idea]);
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
    
    public function troubleCreate(Tag $tag)
    {
        return view('troubles/create')->with(['tags'=>$tag->get()]);
    }
    
    public function troubleSearch(Trouble $trouble,Request $request){
        $keyword=$request->input('keyword');
        $query=Trouble::query();
        if (isset($keyword) && !empty($keyword))
        {
            $query->where('body','LIKE',"%{$keyword}%")
            ->orWhereHas('tag',function ($tag) use ($keyword){
                $tag->where('name','LIKE',"%{$keyword}%");
            });
        }
        $Trouble = $query->paginate(5);
        return view('/troubles/search')->with(['troubles'=>$Trouble,'keyword'=>$keyword]);
    }
    
    public function troubleShow(Trouble $trouble)
    {
        return view('troubles/show')->with(['trouble'=>$trouble]);
    }
    
    public function troubleStore(TroubleRequest $request,Trouble $trouble)
    {
        $input = $request['trouble'];
        $trouble->tag_id = $request['tag'];
        $trouble->user_id = Auth::id();
        //dd($trouble);
        $trouble->fill($input)->save();
        return redirect('/troubles/'.$trouble->id);
    }
    
    public function troubleEdit(Trouble $trouble,Tag $tag)
    {
        $this->authorize('update',$trouble);
        return view('troubles/edit')->with(['trouble'=>$trouble,'tags'=>$tag->get()]); 
    }
    
    public function troubleUpdate(TroubleRequest $request,Trouble $trouble)
    {
        $input=$request['trouble'];
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
    
    
}
