<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('public.rooms.index')->withRooms($rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        Room::create([
          'name'        =>    request('name'),
          'user_id'     =>    $request->user()->id,
          'slug'        =>    str_slug(request('name'),'-'),
          'category'   =>     request('category'),
          'description' =>    request('description'),
          'votes'       =>    0
        ]);
        return redirect('/');
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
        return view('public.rooms.edit', ['room' => $room]);
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
      $room->update([
        'name'         =>     request('name'),
        'slug'         =>     str_slug(request('name'),'-'),
        'category'     =>     request('category'),
        'description'  =>     request('description'),
        'votes'        =>     old('votes')
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
        $room->delete();

        return redirect('/');
    }
}
