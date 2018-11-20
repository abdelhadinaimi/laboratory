<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\Article;
use App\ArticleUser;
use App\User;
use App\Role;
use App\Parametre;

class FrontController extends Controller
{

    public function equipes()
    {

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
        ]);;
    }

    public function equipe($id)
    {   
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();
        $chef = $equipe->chef;
        return view('front.equipe')->with([ 
            'equipe' => $equipe,
            'membres' => $membres,
            'chef' => $chef  
        ]);
    }
    public function profiles($id)
    {
        $membre = User::find($id);

        return view('front.profiles')->with([
            'membre' => $membre,
        ]);;
    }

    //return toutes les publications
    public function getAllPubs()
    {
    //Les types d'article disponible
        $types = Article::select('type')->distinct()->get();
     //les articles publié par les membres
        $compteurs = ArticleUser::select(DB::raw('equipe_id , count(*) as cpt'))
            ->join('users', 'users.id', '=', 'article_user.user_id')
            ->Join('equipes', 'users.equipe_id', '=', 'equipes.id')
            ->groupBy('equipe_id')
            ->get();
     //liste des equipes
        $equipes = DB::table('equipes')->select('id', 'intitule')->get();

     //Les publications par défauts
        $pubs = ArticleUser::join('users', 'users.id', '=', 'article_user.user_id')
            ->join('articles', 'articles.id', '=', 'article_user.article_id')
            ->join('equipes', 'equipes.id', '=', 'users.equipe_id');

     //un filtre pour l'équipe s'il existe
        if (request()->has('equipe_id'))
            $pubs = $pubs->where('equipe_id', "=", request('equipe_id'));
     //un filtre pour les types s'il existes
        if (request()->has('type'))
            $pubs = $pubs->where('type', "=", request('type'));

     //traiter pagination
        $pubs = $pubs->paginate(1)->appends(['type' => request('type'), 'equipe_id' => request('equipe_id')]);
        return view('front.publications', compact('pubs', 'equipes', 'compteurs', 'types'));
    }

}