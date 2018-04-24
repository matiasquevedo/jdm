<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reflexion extends Model
{
    //
    protected $table = "reflexiones";

    protected $fillable = ['title','content','user_id'];


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }
}
