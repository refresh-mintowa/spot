<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable =['title','body','category_id','pref_id','image','user_id'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function pref(){
        return $this->belongsTo('App\Pref');
    }
     public function Likes(){
        return $this->hasMany('App\Like');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
