<?php

namespace App\Http\Controllers;

use App\Room;
use App\Community;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        
        $this->middleware('can:manipulate,room', [
             'only'  =>  ['edit', 'update','destroy']
        ]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $rooms = Room::paginate(10);
        return view('public.rooms.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Community::all();
        return view('public.rooms.create', ['communities' => $communities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $image = $request->file('image');

        $room = Room::create([
          'name'        =>    request('name'),
          'user_id'     =>    $request->user()->id,
          'slug'        =>    str_slug(request('name'),'-'),
          'community_id'   => request('community'),
          'description' =>    request('description'),
          'image'   =>        ($image?$image->store('images','public'):null)
        ]);
        return redirect('/rooms/'.$room->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $room = Room::where('slug',$slug)->firstOrFail();
        return view('public.rooms.show',['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $communities = Community::all();
        return view('public.rooms.edit', [
            'room' => $room,
            'communities' => $communities
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        dd($errors);
        $image = $request->file('image');

        if($image && $room->image){
            Storage::disk('public')->delete($room->image);
        }
      $room->update([
        'name'         =>     request('name'),
        'slug'         =>     str_slug(request('name'),'-'),
        'community_id'     => request('community_id'),
        'description'  =>     request('description'),
        'image' =>  ($image?$image->store('images','public'):$room->image)
      ]);

      return redirect('/rooms/'.$room->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if($room->image){
            Storage::disk('public')->delete($room->image);
        }
        $room->votes()->detach();
        $room->delete();

        return redirect('/rooms')
        ->with('message', "The room '{$room->name}' has been deleted.");
    }
}
