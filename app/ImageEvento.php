<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageEvento extends Model
{
    //
    protected $table = "imagesEventos";

    protected $fillable = ['foto','evento_id'];

    public function evento(){
    	return $this->belongsTo('App\Evento');
    }
}
