<?php

namespace App\Observers;

use App\Community;

use App\Mail\CommunityCreated;
use App\Mail\CommunityEdited;
use App\Mail\CommunityDeleted;
use Illuminate\Support\Facades\Mail;

class CommunityObserver
{
    public function created(Community $community)
    {
        Mail::to($community->user->email)->send(
            new CommunityCreated($community)
        );

       
    }

   
    public function updated(Community $community)
    {
        Mail::to($community->user->email)->send(
            new CommunityEdited($community)
        );

        
    }

    
    public function deleted(Community $community)
    {
        Mail::to($community->user->email)->send(
            new CommunityDeleted($community)
        );

        
    }
}
