<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
     protected $fillable =['name','area_id'];
     public function posts(){
         return $this->hasMany('App/Post');
     }
     public function area(){
          return $this->belongsTo('App/Area');
     }
}
