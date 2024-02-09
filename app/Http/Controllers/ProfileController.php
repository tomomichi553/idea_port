<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Idea;
use App\Models\IdeaLike;
use App\Models\Trouble;
use App\Models\TroubleLike;
use App\Models\Tag;
use App\Models\User;
use Cloudinary;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $icon = null;
        if($request->hasFile('icon')){
            $icon = Cloudinary::upload($request->file('icon')->getRealPath())->getSecurePath();
            //dd($icon);
        }
        
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        //$request->files->remove('icon');
        //$request->merge(['icon' => $icon]);
        //dd($request);
        if ($icon !== null) {
            $request->user()->icon = $icon;
        }
        $request->user()->save();

        return redirect('/profile/'.Auth::id());
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    public function post(User $user,Idea $idea,Trouble $trouble,Request $request)
    {
         //$userId=Auth::id();
         $userId=$user->id;
         $ideas=$idea->where('user_id',$userId)->latest()->paginate(5,["*"],'idea-page')
         ->appends(["idea-page" => $request->input('idea-page')]);
         $troubles=$trouble->where('user_id',$userId)->latest()->paginate(5,["*"],'trouble-page')
         ->appends(["trouble-page" => $request->input('trouble-page')]);
         return view('profile/index')->with(['ideas' => $ideas ,'troubles'=>$troubles]);
    }
    
    public function show(User $user)
    {
        return view('profile/show')->with(['user'=>$user]);
    }
    
    public function like(Idea $idea,Trouble $trouble,Request $request)
    {
        //$ideas=$idealike->where('user_id',Auth::id());
        $ideas = IdeaLike::where('user_id', Auth::id())
            ->with('idea.tag','idea.user')
            ->orderBy('updated_at','DESC')->paginate(5,["*"],'idea-page')
            ->appends(["idea-page" => $request->input('idea-page')]);
        //dd($ideas);
        $troubles=TroubleLike::where('user_id', Auth::id())
            ->with('trouble.tag','trouble.user')
            ->orderBy('updated_at','DESC')->paginate(5,["*"],'trouble-page')
            ->appends(["trouble-page" => $request->input('trouble-page')]);
        //dd($troubles);
        return view('profile/like')->with(['ideas'=>$ideas,'troubles'=>$troubles]);
    }
}
