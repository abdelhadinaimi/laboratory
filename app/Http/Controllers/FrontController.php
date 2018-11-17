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

    //return toutes les publications
    public function getAllPubs(){
    	$typeArticles = DB::table('articles')->select('type')->distinct()->get();
     $nbrPub = DB::table('article_user')
     ->select(DB::raw('equipe_id , count(*) as cpt'))
        ->join('users','users.id','=','article_user.user_id')
        ->Join('equipes','users.equipe_id','=','equipes.id')
        ->groupBy('equipe_id')
        ->get();
     $equipes = DB::table('equipes')->select('id','intitule')->get();
     $pubs = DB::table('article_user')->join('users','users.id','=','article_user.user_id')
        ->join('articles','articles.id','=','article_user.article_id')->paginate(2);

    	return view('front.publications')->withPubs($pubs)->withEquipes($equipes)->withCompteurs($nbrPub)->withTypes($typeArticles);
    }

}