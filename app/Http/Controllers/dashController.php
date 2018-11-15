<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Parametre;

class dashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {  
        $labo = Parametre::find('1');
    // $membres = User::get()->cont();    
    // $membres = User::select(DB::raw('count(DISTINCT name) as name_count'))->get(); 
    $membres = DB::table('users')->distinct('id')->count();
    $equipes = DB::table('equipes')->distinct('id')->count();
    $articles = DB::table('articles')->distinct('id')->count();
    $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();

    	 
        return view('dashboard')->with([
        	'membres' => $membres,
        	'equipes' => $equipes,
        	'articles' => $articles,
        	'theses' => $theses,
            'labo'=>$labo,
        ]);
    }
}
