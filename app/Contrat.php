<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function reservation(){

        return $this->belongsTo(reservation::class);
    }
}
