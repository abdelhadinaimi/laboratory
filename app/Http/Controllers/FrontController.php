<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;

class FrontController extends Controller{

    public function equipes(){

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
        ]);;
    }

}