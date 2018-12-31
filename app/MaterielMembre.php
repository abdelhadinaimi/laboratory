<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterielMembre extends Model
{
        protected $table = "materiels_membres";
        
    public function materiel()
    {
        return $this->belongsTo('App\Materiel');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
