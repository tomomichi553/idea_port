<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TroubleComments;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class TroubleCommentsPolicy
{
     public function update(User $user,TroubleComments $comment)
    {
        if($user->id==$comment->user_id){
            return true;
        }else{
            return false;
        }    
    }
    
    
    public function delete(User $user,TroubleComments $comment)
    {
        return $user->id===$comment->user_id;
    }
    
    
    public function __construct()
    {
        //
    }
}
