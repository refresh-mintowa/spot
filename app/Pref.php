<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
     protected $fillable =['name'];
     public function posts(){
         return $this->hasMany('App/Post');
     }
}
