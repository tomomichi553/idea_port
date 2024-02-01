<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Idea;
use App\Models\Trouble;
use App\Models\Tag;
use App\Models\User;
use Cloudinary;


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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
    
    public function post(User $user,Idea $idea,Trouble $trouble)
    {
         //$userId=Auth::id();
         $userId=$user->id;
         $ideas=$idea->where('user_id',$userId)->latest()->paginate(5);
         $troubles=$trouble->where('user_id',$userId)->latest()->paginate(5);
         return view('profile/index')->with(['ideas' => $ideas ,'troubles'=>$troubles]);
    }
    
    public function show(User $user)
    {
        return view('profile/show')->with(['user'=>$user]);
    }
}
