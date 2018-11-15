<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

   public function chef()
    {
        return $this->belongsTo('App\User');
    }

    public function membres()
    {
    	return $this->hasMany('App\User');
    }

}
