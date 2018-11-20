<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\Projet;

class FrontController extends Controller{

    public function equipes(){

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
        ]);;
    }
    public function index()
    {
    	$users = DB::table('Projets')
    		   ->join('users', 'Projets.chef_id', '=', 'users.id')
    		   ->get();
    	return view('front.index')->with([
            'projets' => $users,
        ]);;
    }

}