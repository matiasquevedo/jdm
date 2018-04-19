<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model 
{

    protected $table = "articles";

    protected $fillable = ['title','content','bajada','volanta','fuente','user_id'];


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }
}
