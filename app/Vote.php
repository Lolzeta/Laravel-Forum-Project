<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'valoration'];

    public function user(){
        return $this->belongsTo(User::class);
      }

    public function rooms(){
        return $this->belongsToMany(Room::class);
      }

    public function messages(){
      return $this->belongsToMany(Message::class);
    }

   
}
