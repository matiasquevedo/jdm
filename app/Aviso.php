<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    //
      protected $table = "avisos";

    protected $fillable = ['aviso','titulo'];

}
