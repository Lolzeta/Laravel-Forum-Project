<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
   

    
    public function show(User $user)
    {
        
    }


    public function edit(User $user)
    {
        return view('public.users.edit', ['user' => $user]);
    }

   
    public function update(UserRequest $request, User $user)
    {
        $avatar = $request->file('avatar');
        if($avatar && $user->avatar){
            Storage::disk('public')->delete($user->avatar);
        }
      $user->update([
        'name'         =>     request('name'),
        'avatar' =>  ($avatar?$avatar->store('avatars','public'):$user->avatar),
        'email' =>  request('email')
      ]);
      if(request('password')){
        if(request('password')!=''){
        $user->update([
        'password'  =>     Hash::make(request('password'))
        ]);}}
    return redirect('/');
    }

    public function list(){

    }
}
