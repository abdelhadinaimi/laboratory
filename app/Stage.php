<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
        protected $table = "stages";

	
	public function stagiaire()
    {
        return $this->belongsTo('App\User');
    }

    public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
