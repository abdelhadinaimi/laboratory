<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterielEquipe extends Model
{
        protected $table = "materiels_equipes";
         
         public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }
    public function equipe()
    {
        return $this->belongsTo('App\Equipe');
    }

}
