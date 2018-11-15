<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parametre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labo = Parametre::find('1');
        $membres = DB::table('users')->distinct('id')->count();
        $equipes = DB::table('equipes')->distinct('id')->count();
        $articles = DB::table('articles')->distinct('id')->count();
        $theses = DB::table('theses')->distinct('id')->where('date_soutenance', null)->count();


        return view('dashboard')->with([
            'membres' => $membres,
            'equipes' => $equipes,
            'articles' => $articles,
            'theses' => $theses,
            'labo' => $labo,
        ]);
        return view('dashboard');
    }
}
