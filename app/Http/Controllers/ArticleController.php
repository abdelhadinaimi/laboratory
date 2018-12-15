<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Contact;
use App\ArticleUser;
use App\ArticleContact;
use App\Parametre;
use Auth;
use App\Http\Requests\articleRequest;
use Illuminate\Http\UploadedFile;



class ArticleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	//permet de lister les articles
    public function index(){

    	$labo = Parametre::find('1');
    	$listarticle = Article::all();
    	return view('article.index' , ['articles' => $listarticle] ,['labo'=>$labo]);

    }

    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$article = Article::find($id);
		$membres = $article->users()->orderBy('name')->get();
		$contacts = $article->contacts()->orderBy('nom')->get();
	 	return view('article.details')->with([
	 		'article' => $article,
			'membres' => $membres,
			'contacts' => $contacts,
	 		'labo' => $labo,
	 	]);;
    }

    //affichage de formulaire de creation d'articles
	 public function create()
	 {
	 	$labo = Parametre::find('1');
	 	// if( Auth::user()->role->nom == 'admin')
            {
	 	$membres = User::all();
		$article = Article::all();
		$contacts = Contact::all(); 

	 	return view('article.create',['membres'=>$membres,'contacts'=>$contacts],['labo'=>$labo]);
			 }
            // else{
            //     return view('errors.403');
            // }

    }

    //enregistrer un article
	 public function store(articleRequest $request){

	 	$article = new Article();
	 	$labo = Parametre::find('1');

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');

            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/article'),$file_name);
            $article->detail = '/uploads/article/'.$file_name;
        }

	 	$article->type = $request->input('type');
	 	$article->titre = $request->input('titre');
	 	$article->resume = $request->input('resume');
	 	$article->lieu_ville = $request->input('ville');
	 	$article->lieu_pays = $request->input('pays');
	 	$article->conference = $request->input('conference');
	 	$article->journal = $request->input('journal');
	 	$article->ISSN = $request->input('issn');
	 	$article->ISBN = $request->input('isbn');
	 	$article->mois = $request->input('mois');
	 	$article->annee = $request->input('annee');
	 	$article->doi = $request->input('doi');
	 	$article->membres_ext = $request->input('membres_ext');
	 	$article->deposer = Auth::user()->id;
	 	
	 	
	 	$article->save();

        $members =  $request->input('membre');
        foreach ($members as $key => $value) {
	 		$article_user = new ArticleUser();
		 	$article_user->article_id = $article->id;
		 	$article_user->user_id = $value;
	 	    $article_user->save();
		}

		$contacts =  $request->input('contacts');
        foreach ($contacts as $key => $value) {
	 		$article_contact = new ArticleContact();
		 	$article_contact->article_id = $article->id;
		 	$article_contact->contact_id = $value;
	 	    $article_contact->save();
         } 

	 	return redirect('articles');

	 	//return response()->json(["arr"=>$request->input('membre')]);

    }

    //récuperer un article puis le mettre dans le formulaire
	 public function edit($id){

	 	$article = Article::find($id);
		$membres = User::all();
		$contacts = Contact::all(); 

	 	$labo = Parametre::find('1');

	 	$this->authorize('update', $article);

	 	return view('article.edit')->with([
			'article' => $article,
			'contacts' => $contacts, 
	 		'membres'=>$membres,
	 		'labo'=>$labo,
	 	]);;
    }

    //modifier et inserer
    public function update(articleRequest $request ,$id){
    
    	$article = Article::find($id);
    	$labo = Parametre::find('1');

    	$article->type = $request->input('type');
	 	$article->titre = $request->input('titre');
	 	$article->resume = $request->input('resume');
	 	$article->lieu_ville = $request->input('ville');
	 	$article->lieu_pays = $request->input('pays');
	 	$article->conference = $request->input('conference');
	 	$article->journal = $request->input('journal');
	 	$article->ISSN = $request->input('issn');
	 	$article->ISBN = $request->input('isbn');
	 	$article->mois = $request->input('mois');
	 	$article->annee = $request->input('annee');
	 	$article->doi = $request->input('doi');

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/article'),$file_name);

        $article->detail = '/uploads/article/'.$file_name;

        }
	 	
	 	$article->save();

		$members =  $request->input('membre');
		$article_user = ArticleUser::where('article_id',$id);
        $article_user->delete();
    
		foreach ($members as $key => $value) {
            $article_user = new ArticleUser();
            $article_user->article_id = $article->id;
            $article_user->user_id = $value;
            $article_user->save();
		} 

		$contacts =  $request->input('contacts');
		$article_user = ArticleContact::where('article_id',$id);
        $article_user->delete();
    
		foreach ($contacts as $key => $value) {
			$article_contact = new ArticleContact();
			$article_contact->article_id = $article->id;
			$article_contact->contact_id = $value;
			$article_contact->save();
         }  

	 	return redirect('articles');
    }
    
    //supprimer un article
    public function destroy($id){

    	$article = Article::find($id);

	 	$this->authorize('delete', $article);

        $article->delete();
        return redirect('articles');

    }
}
