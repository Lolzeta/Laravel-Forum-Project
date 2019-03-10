<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\MessageRequest;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        
        /*$this->middleware('can:manipulate,message', [
             'only'  =>  ['edit','update','destroy']
        ]);*/
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        sleep(2);
        $message = Message::create([
            'user_id'   =>  $request->user()->id,
            'room_id'   =>  request('room_id'),
            'message'   =>  htmlentities(request('message'))
        ]);
        return view('public.messages.message', ['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   sleep(2);
        $message = Message::where('id', $id)->first();
        return view('public.messages.show',['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        sleep(2);
        $this->authorize("manipulate",Message::class);
        $message = Message::where('id', $id)->first();
        $message->update([
            'message'   => request('message'),
          ]);
          return view('public.messages.message', ['message' => $message]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      sleep(2);
      $this->authorize("manipulate",Message::class);
      $message = Message::where('id', $id)->first();
      $message->delete();
      return 'Message '.$id.' has been deleted.';
    }

    public function returnMessage($id){
        $message = Message::where('id', $id)->first();
        $message->votes()->detach();
        return $message->message;
    }
}
