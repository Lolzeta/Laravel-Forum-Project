<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['user_id','name', 'slug', 'category', 'description', 'votes'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function messages(){
      return $this->hasMany(Message::class);
    }

    public function community(){
      return $this->belongsTo(Community::class);
    }
}
