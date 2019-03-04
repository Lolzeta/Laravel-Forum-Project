<?php

namespace App\Policies;

use App\User;
use App\Community;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommunityPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        
        if( $user->role == 'admin' ) return true;
    }
    
    public function manipulate(User $user, Community $community)
    {
        return $community->user_id == $user->id || $user->role == 'admin';
    }
}
