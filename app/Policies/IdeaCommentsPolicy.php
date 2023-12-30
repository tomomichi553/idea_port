<?php

namespace App\Policies;

use App\Models\User;
use App\Models\IdeaComments;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class IdeaCommentsPolicy
{
    public function update(User $user,IdeaComments $comment)
    {
        if($user->id==$comment->user_id){
            return true;
        }else{
            return false;
        }    
    }
    
    
    public function delete(User $user,IdeaComments $comment)
    {
        return $user->id===$comment->user_id;
    }
    
    
    public function __construct()
    {
        //
    }
}
