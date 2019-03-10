<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;

    
    
    public function manipulate(User $user, Room $room)
    {
        
        return $room->user_id == $user->id || $user->role == 'admin';
    }

    public function vote(User $user, Room $room){
        foreach($room->votes as $vote){
            if($vote->user->id==$user->id){
                return false;
            }
        }
        return true;
    }
}
