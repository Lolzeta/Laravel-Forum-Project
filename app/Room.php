<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    protected $fillable = ['user_id', 'community_id','name', 'slug', 'description', 'image'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function messages(){
      return $this->hasMany(Message::class);
    }

    public function community(){
      return $this->belongsTo(Community::class);
    }

    public function votes(){
      return $this->belongsToMany(Vote::class);
    }
}
