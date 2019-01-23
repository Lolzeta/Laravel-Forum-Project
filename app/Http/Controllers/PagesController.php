<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class PagesController extends Controller
{
  public function index(){
    $rooms = Room::all();
    return view('public.pages.index')->withRooms($rooms);
  }

  public function contact(){
    return view('public.pages.contact');
  }

  public function about(){
    return view('public.pages.about');
  }






}
