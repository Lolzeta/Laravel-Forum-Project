<?php

namespace App\Http\Controllers;
use App\Room;
use App\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['up_room','down_room']
        ]);
        
    }

    function up_room(Request $request, Vote $vote, $id){
        $room = Room::where('id', $id)->first();
        $this->authorize("vote",$room);
        $vote = Vote::create([
            'user_id'     =>    $request->user()->id,
            'valoration'  =>    '1',
        ]);
        $room->votes()->syncWithoutDetaching($vote);
        return redirect('/rooms/'.$room->slug);
    }

    function down_room(Request $request, Vote $vote, $id){
        $room = Room::where('id', $id)->first();
        $this->authorize("vote",$room);
        $vote = Vote::create([
            'user_id'     =>    $request->user()->id,
            'valoration'  =>    '-1',
        ]);
        $room->votes()->syncWithoutDetaching($vote);
        return redirect('/rooms/'.$room->slug);
    }
}
