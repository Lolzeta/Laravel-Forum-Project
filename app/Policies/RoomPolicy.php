<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        
        if( $user->role == 'admin' ) return true;
    }
    
    public function manipulate(User $user, Room $room)
    {
        
        return $room->user_id == $user->id || $user->role == 'admin';
    }
}
