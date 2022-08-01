<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function voiture(){

        return $this->hasOne(Voiture::class);
    }

    public function contrat(){

        return $this->belongsTo(Contrat::class);
    }
}
