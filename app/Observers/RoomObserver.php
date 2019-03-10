<?php

namespace App\Observers;

use App\Room;

use App\Mail\RoomCreated;
use App\Mail\RoomEdited;
use App\Mail\RoomDeleted;
use Illuminate\Support\Facades\Mail;

class RoomObserver
{

    public function created(Room $room)
    {
        Mail::to($room->user->email)->send(
            new RoomCreated($room)
        );
    }

   
    public function updated(Room $room)
    {
        Mail::to($room->user->email)->send(
            new RoomEdited($room)
        );

       
    }

    
    public function deleted(Room $room)
    {
        Mail::to($room->user->email)->send(
            new RoomDeleted($room)
        );

       
    }
}
