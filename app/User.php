<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel' , 'ville'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations(){

        return $this->hasMany(reservation::class)->orderBy('created_at','DESC') ;
    }

    public function voitures(){

        return $this->hasMany(voiture::class)->orderBy('created_at','DESC') ;
    }

    public function contrats(){

        return $this->hasMany(contrat::class)->orderBy('created_at','DESC') ;
    }

    public function isAdmin() {
        return $this->admin ? true : false;
    }
}
