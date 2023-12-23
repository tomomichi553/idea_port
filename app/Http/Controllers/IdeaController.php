<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IdeaRequest;
use App\Http\Requests\TroubleRequest;
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
    
    public function ideaStore(IdeaRequest $request,Idea $idea)
    {
        $input = $request['idea'];
        //dd($request->all());
        $idea->tag_id = $request['tag'];
        $idea->user_id = Auth::id();
        $idea->fill($input)->save();
        return redirect('/ideas/'.$idea->id);
    }
    
    public function troubleCreate(Tag $tag)
    {
        return view('troubles/create')->with(['tags'=>$tag->get()]);
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
}
