<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];
    
    public function prefs()
    {
        return $this->hasMany('App\Pref');
    }
}
