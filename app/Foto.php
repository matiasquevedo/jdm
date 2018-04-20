<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = "fotos";

    protected $fillable = ['foto','album_id'];

    public function album(){
    	return $this->belongsTo('App\Album');
    }
}


