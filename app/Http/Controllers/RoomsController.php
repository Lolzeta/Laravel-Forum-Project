<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
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
    public function store(Request $request)
    {
        request()->validate([
          'name'                        =>      'required|min:3',
          'cathegory'                   =>      'required|min:10',
          'creator'                     =>      'required|min:5',
          'description'                 =>      'required|min:10'
        ], [
          'name.required'               =>      'El nombre de la sala es necesario',
          'name.min'                    =>      'El nombre de la sala debe de contener como minimo tres caracteres',
          'cathegory.required'          =>      'La categoria de la sala es necesaria',
          'cathegory.min'               =>      'La categoria debe de contener como minimo diez caracteres',
          'creator.required'            =>      'El creador de la sala es necesario',
          'creator.min'                 =>      'El creador de la sala debe contener minimo cinco caracteres',
          'description.required'        =>      'La descripcion de la sala es necesario',
          'description.min'             =>      'La descripcion de la sala debe de contener minimo diez caracteres'
        ]);
        Room::create([
          'name'        =>    request('name'),
          'slug'        =>    str_slug(request('name'),'-'),
          'cathegory'   =>    request('cathegory'),
          'creator'     =>    request('creator'),
          'description' =>    request('description')
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
    public function update(Room $room)
    {
      request()->validate([
        'name'                        =>      'required|min:3',
        'cathegory'                   =>      'required|min:10',
        'creator'                     =>      'required|min:5',
        'description'                 =>      'required|min:10'
      ], [
        'name.required'               =>      'El nombre de la sala es necesario',
        'name.min'                    =>      'El nombre de la sala debe de contener como minimo tres caracteres',
        'cathegory.required'          =>      'La categoria de la sala es necesaria',
        'cathegory.min'               =>      'La categoria debe de contener como minimo diez caracteres',
        'creator.required'            =>      'El creador de la sala es necesario',
        'creator.min'                 =>      'El creador de la sala debe contener minimo cinco caracteres',
        'description.required'        =>      'La descripcion de la sala es necesario',
        'description.min'             =>      'La descripcion de la sala debe de contener minimo diez caracteres'
      ]);
      $room->update([
        'name'         =>     request('name'),
        'slug'         =>     str_slug(request('name'),'-'),
        'cathegory'    =>     request('cathegory'),
        'creator'      =>     request('creator'),
        'description'  =>     request('description')
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
