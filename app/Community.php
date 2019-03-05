<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
      }
  
    public function rooms(){
        return $this->hasMany(Room::class);
      }
}
