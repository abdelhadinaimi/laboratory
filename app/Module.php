<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'libelle','description','user_id'
    ];
    public function cours()
{
    return $this->belongsToMany('App\Cour');
}
}
