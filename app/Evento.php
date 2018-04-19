<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Evento extends Model
{
    //
    protected $table = "eventos";

    protected $fillable = ['title','fecha','hora','lugar','tipo','descripcion','precio','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function images(){
    	return $this->hasMany('App\ImageEvento');
    }
}
