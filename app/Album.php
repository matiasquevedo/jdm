<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "albumes";

    protected $fillable = ['titulo','descripcion','portada','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function fotos(){
    	return $this->hasMany('App\Image');
    }
}






