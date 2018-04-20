<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function eventos(){
        return $this->hasMany('App\Evento');
    }

    public function albumes(){
        return $this->hasMany('App\Album');
    }

    public function nova(){
        return $this->type === 'nuevo';
    }

    public function admin(){
        return $this->type === 'admin';
    }

    public function member(){
        return $this->type === 'member';
    }

    public function ads(){
        return $this->hasMany('App\Ad');
    }

    


}
