<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Trouble;

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
    
    public function troubleShow(Trouble $trouble)
    {
        return view('troubles/show')->with(['trouble'=>$trouble]);
    }
}
