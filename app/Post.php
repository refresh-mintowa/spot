<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable =['title','body','category_id','pref_id','image'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
