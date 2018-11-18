<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
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
        'name', 'email', 'password','photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function these()
    {
        return $this->hasOne('App\These');
    }

    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }


    public function projet()
    {
        return $this->hasOne('App\Projet');
    }

     public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function projets()
    {
        return $this->belongsToMany('App\Projet');
    }
    
    public function role()
    {
        //foreign key de role-id dans la table users
        return $this->belongsTo(Role::class);
    }
}
