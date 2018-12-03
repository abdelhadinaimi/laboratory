<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\Article;
use App\Projet;
use App\ArticleUser;
use App\User;
use App\Role;
use App\Parametre;
use App\Actualite;

class FrontController extends Controller{

    public function equipes(){

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
        ]);;
    }

    public function equipe($id)
    {   
        $equipe = Equipe::find($id);
        $projets = DB::table('users')
            ->select('projets.id','projets.intitule','projets.resume')
            ->distinct()
            ->where('users.equipe_id','=',$equipe->id)
            ->join('projet_user', 'users.id', '=', 'projet_user.user_id')
            ->join('projets','projets.id', '=', 'projet_user.projet_id')
            ->get();
               
        return view('front.equipe')->with([ 
            'equipe' => $equipe,
            'membres' => $equipe->membres,
            'chef' => $equipe->chef,
            'projets' =>  $projets
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

        //le nombre d'article pour chaque Equipe
         $compteurs = ArticleUser::select(DB::raw('equipe_id , count(distinct(article_id)) as cpt'))
            ->join('users', 'users.id', '=', 'article_user.user_id')
            ->Join('equipes', 'users.equipe_id', '=', 'equipes.id')
            ->groupBy('equipe_id')
            ->get();
        //liste des equipes
          $equipes = DB::table('equipes')->select('id', 'intitule')->get();

     //Les publications par défauts
        /*$pubs = ArticleUser::join('users', 'users.id', '=', 'article_user.user_id')
            ->join('articles', 'articles.id', '=', 'article_user.article_id')
            ->join('equipes', 'equipes.id', '=', 'users.equipe_id');*/
    $pubs = new Article;
     //un filtre pour l'équipe s'il existe
        if (request()->has('equipe_id'))
        {
            $pubs = $pubs
                  ->whereExists(function ($query) {
                      $query->select(DB::raw(1))
                      ->from('article_user')
                      ->whereRaw('article_user.article_id = articles.id')
                      ->whereExists(function ($query) {
                            $query->select(DB::raw(1))
                            ->from('users')
                            ->whereRaw('users.equipe_id ='.request('equipe_id').' And users.id = article_user.user_id');
                      });
                   });
            
            /*$pubs = $pubs->join('article_user', 'article_user.article_id', '=', 'articles.id')
            ->join('users', 'users.id', '=', 'article_user.user_id')
            ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
            ->where('equipe_id', "=", request('equipe_id'));*/
        }
     //un filtre pour les types s'il existes
        if (request()->has('type'))
            $pubs = $pubs->where('type', "=", request('type'));

        if (request()->has('from'))
            $pubs = $pubs->where('annee', ">=", request('from'));
        if (request()->has('to'))
            $pubs = $pubs->where('annee', "<=", request('to'));

        if (request()->has('term'))
            {
               $term = request('term');
               $pubs = $pubs
                       ->Where('titre', 'LIKE', '%'.$term.'%')
                       ->take(5);
            }

     //traiter pagination
        $pubs = $pubs->paginate(2)->appends(['type' => request('type'), 'equipe_id' => request('equipe_id'),'from' => request('from'),'to' => request('to') , 'term' => request('term')]);
        return view('front.publications', compact('pubs', 'equipes', 'compteurs', 'types'));
    }
    public function autocomplete(){
        $term = request('term');
        $queries = DB::table('articles')
        ->where('resume', 'LIKE', '%'.$term.'%')
        ->orWhere('titre', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->titre ];
    }
       return response()->json($results);
    }

    public function index()
    {
    	$users = DB::table('projets')
    		   ->join('users', 'projets.chef_id', '=', 'users.id')
               ->orderBy('chef_id', 'desc')
               ->take(5)
    		   ->get();
        $latestActualite = Actualite::orderBy('id', 'desc')->take(5)->get(); 
    	return view('front.index')->with([
            'projets' => $users,
            'latestActs' => $latestActualite
        ]);
    }
    public function actualites()
    {
        $actualites = Actualite::all();  
        $latestActualite = Actualite::orderBy('id', 'desc')->take(5)->get(); 
        return view('front.actualite')->with([
            'actualites' => $actualites,
            'latestActs'  => $latestActualite
        ]);
    }

}