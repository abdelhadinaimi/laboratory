<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\User;
use App\Role;
use App\Parametre;

class FrontController extends Controller{

    public function equipes(){

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
        ]);;
    }
  public function profiles($id)
    {
        $membre = User::find($id);
  


        return view('front.profiles')->with([
            'membre' => $membre,
            
        ]);;
    }
}