<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
