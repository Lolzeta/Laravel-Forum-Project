<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rooms(){
      return $this->hasMany(Room::class);
    }

    public function messages(){
      return $this->hasMany(Message::class);
    }

    public function communities(){
      return $this->hasMany(Community::class);
    }

    public function votes(){
      return $this->hasMany(Vote::class);
    }


}
