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
use App\Message;
use App\Http\Requests\messageRequest;


class FrontController extends Controller{

    public function equipes(){

        return view('front.equipes')->with([
            'equipes' => Equipe::all(),
            'labo' =>Parametre::find('1')

        ]);;
    }

    public function equipe($id)
    {   
        $equipe = Equipe::find($id);
        $projets = array();
        foreach($equipe->membres as $user){
            foreach($user->projets as $projet){
                $found = false;
                foreach($projets as $p){
                    if($p->id == $projet->id){
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    $projets[] = $projet;
                }
            }
        }
        $partenaires = array();
        foreach($projets as $projet){
            foreach($projet->contacts as $contact){
                $part = $contact->partenaire;
                if(!in_array($part,$partenaires)){
                    $partenaires[] = $part;
                }
            }
        }
        return view('front.equipe')->with([ 
            'equipe' => $equipe,
            'membres' => $equipe->membres,
            'chef' => $equipe->chef,
            'projets' =>  $projets,
            'partenaires' => $partenaires,
            'labo' =>Parametre::find('1')

        ]);
    }

    public function profiles($id)
    {
        $membre = User::find($id);
        return view('front.profiles')->with([
            'membre' => $membre,
             'labo' =>Parametre::find('1')

        ]);;
    }

public function detailActual($id)
{
    $detail = Actualite::find($id);
    return view('front.details')->with([
            'actualite' => $detail,
                        'labo' =>Parametre::find('1')

        ]);
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
        $pubs = $pubs->paginate(6)->appends(['type' => request('type'), 'equipe_id' => request('equipe_id'),'from' => request('from'),'to' => request('to') , 'term' => request('term')]);
        return view('front.publications',compact('pubs', 'equipes', 'compteurs', 'types'))->with([
        
            'labo' =>Parametre::find('1')
        ]);
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
    	$projets = Projet::orderBy('id')->take(3)->get();

        $latestActualite = Actualite::orderBy('id', 'desc')->take(3)->get();
        $latestArticles = Article::orderBy('id')->take(3)->get(); 

    	return view('front.index')->with([
            'projets' => $projets,
            'latestActs' => $latestActualite,
            'latestArticles' => $latestArticles,
            'labo' =>Parametre::find('1')
        ]);
    }
    public function actualites(Request $req)
    {
        $term = $req->input('term');
        $actualites = Actualite::orderBy('id', 'desc')->get();  
        $actualites = Actualite::orderBy('id', 'desc')->search($term)->paginate(4);
        $latestActualite = [Actualite::find('5'),Actualite::find('9'),Actualite::find('7')];
        return view('front.actualite')->with([
            'actualites' => $actualites,
            'latestActs'  => $latestActualite,
             'labo' =>Parametre::find('1')

        ]);
    }

    public function projets()
    {
        $projets = Projet::paginate(9);
        return view('front.projets')->with([
            'projets' => $projets,
            'labo' =>Parametre::find('1')

        ]);

    }

    public function projet($id)
    {
        $projet = Projet::find($id);
        $contacts = $projet->contacts()->orderBy('nom')->get();
        $partenaires = array();
        foreach($contacts as $contact){
            $part = $contact->partenaire;
            if(!in_array($part,$partenaires)){
                $partenaires[] = $part;
            }
        }
        return view('front.projet')->with([
            'projet' => $projet,
            'contacts' => $contacts,
            'partenaires' => $partenaires,
            'labo' =>Parametre::find('1')
            

        ]); 
    }

    public function contact(messageRequest $request){
        $validated = $request->validated();
        $message = new Message();
        $message->nom = $validated['nom'];
        $message->email = $validated['email'];
        $message->telephone = $validated['telephone'];
        $message->sujet = $validated['sujet'];
        $message->msg = $validated['msg'];

        $message->save();
        return redirect('front/contact')->with([
            'success' => true
        ]);
        
    }
}
