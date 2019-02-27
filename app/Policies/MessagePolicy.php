<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if( $user->role == 'admin' ) return true;
    }
    
    public function manipulate(User $user, Message $message)
    {
        return $message->user_id == $user->id || $user->role == 'admin';
    }
    
}
