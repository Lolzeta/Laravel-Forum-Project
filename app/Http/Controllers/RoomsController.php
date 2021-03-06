<?php

namespace App\Http\Controllers;

use App\User;
use App\Room;
use App\Community;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use App\Notifications\RoomCreated;
use App\Notifications\RoomEdited;
use App\Notifications\RoomDeleted;

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
        
      $user = User::where('id',$room->user->id)->first();
      $user->notify(new RoomEdited($room));
      $admin = User::where('role','admin')->first();
      $admin->notify(new RoomEdited($room));
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
        $messages = $room->messages->take(10);
        return view('public.rooms.show',[
            'room' => $room,
            'messages' => $messages
            ]);
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
        
        $image = $request->file('image');

        if($image && $room->image){
            Storage::disk('public')->delete($room->image);
        }
      $room->update([
        'name'         =>     request('name'),
        'slug'         =>     str_slug(request('name'),'-'),
        'community_id'     => request('community'),
        'description'  =>     request('description'),
        'image' =>  ($image?$image->store('images','public'):$room->image)
      ]);
      $user = User::where('id',$room->user->id)->first();
      $user->notify(new RoomEdited($room));
      $admin = User::where('role','admin')->first();
      $admin->notify(new RoomEdited($room));
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
        
      $user = User::where('id',$room->user->id)->first();
      $user->notify(new RoomEdited($room));
      $admin = User::where('role','admin')->first();
      $admin->notify(new RoomEdited($room));
        

        if($room->image){
            Storage::disk('public')->delete($room->image);
        }
        $room->votes()->detach();
        $room->delete();

        return redirect('/rooms')
        ->with('message', "The room '{$room->name}' has been deleted.");
    }

    public function paginateMessages($id,$count)
	{
        sleep(2);
        $room = Room::where('id', $id)->first();
        $messages = $room->messages->slice($count)->take(10);
        $view = "";
        if(!empty($messages)){
            $view = view('public.messages.paginationMessages', ['messages' => $messages]);
        }
        return $view;
    
	}
}
