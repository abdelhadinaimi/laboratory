<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "actualite";


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
