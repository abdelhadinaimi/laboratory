<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Traitement materiels
Route::get('materiels','MaterielController@index');
Route::get('getCat','MaterielController@getCategories');
Route::get('getMat','MaterielController@getMateriels');
Route::get('getInformationMat/{id}','MaterielController@getMat');

Route::post('createCat','MaterielController@createCategorie');
Route::post('createMat','MaterielController@createMateriel');

Route::post('deleteCat','MaterielController@deleteCategorie');
Route::post('deleteMat','MaterielController@deleteMateriel');

Route::post('editCat/{id}','MaterielController@editCategorie');
Route::post('editMat/{id}','MaterielController@editMateriel');

Route::get('dashboard','dashController@index');
Route::get('parametre','ParametreController@create');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');


Route::get('test','EquipeController@index');

Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Route::get('actualites','ActualiteController@index');
Route::get('actualites/create','ActualiteController@create');
Route::post('actualites','ActualiteController@store');
Route::get('actualites/{id}/edit','ActualiteController@edit');
Route::get('actualites/{id}/details','ActualiteController@details');
Route::put('actualites/{id}','ActualiteController@update');
Route::delete('actualites/{id}','ActualiteController@destroy');

Route::get('partenaires','PartenaireController@index');
Route::get('partenaires/all','PartenaireController@all');
Route::post('partenaires/create','PartenaireController@create');
Route::post('partenaires/{id}/edit','PartenaireController@edit');
Route::delete('partenaires/{id}','PartenaireController@delete');

Route::get('contacts/all','ContactController@all');
Route::post('contacts/create','ContactController@create');
Route::post('contacts/{id}/edit','ContactController@edit');
Route::delete('contacts/{id}','ContactController@delete');


Route::get('messages','MessageController@index');
Route::delete('message/{id}','MessageController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});
//Stat pie
//SELECT count(users.id),equipes.intitule FROM `equipes`,`users`,`article_user`,`articles` WHERE users.equipe_id=equipes.id AND article_user.user_id=users.id AND year(articles.created_at)=2018 and articles.id=article_user.article_id GROUP BY equipes.id
Route::get('/stat-bar-article',function(){
	$year = date('Y');
	$years = array();
	$equipes = Equipe::pluck('intitule');
	for ($x = 10; $x>=0 ; $x--)
	{
	    $years[] = $year-$x;
	    
	}
	$nombres = Equipe::join('users', 'equipes.id', '=', 'users.equipe_id')
			->join('article_user','article_user.user_id','=','users.id')
			->join('articles','articles.id','=','article_user.article_id')
			->select('equipes.id as id','equipes.intitule as intitule', DB::raw("count(users.equipe_id) as count"),DB::raw('YEAR(articles.created_at) year'))
			->groupBy('equipes.id','year')
			->get();

  
	return response()->json(["nombres"=>$nombres,
						     "equipes"=>$equipes,
							 "years"=>$years
							]);
});
Route::get('/stat-bar-stacked-article',function(){
	$year = date('Y');
	$years = array();
	for ($x = 10; $x>-1 ; $x--)
	{
	    $years[] = $year-$x;    
    }
    $countArticle = Article::select('id','type', DB::raw('count(type) as count'),'annee')
             ->groupBy('annee','type')
             ->orderBy('id','ASC')
             ->get();
    $type = Article::distinct('type')->pluck('type');
  
	return response()->json(["countArticle"=>$countArticle,
							 "years"=> $years
							]);
});
Route::get('/statPie',function(){

	$nmbrEquipe = Equipe::distinct('id')->count();
	$equipes = Equipe::pluck('intitule');
	$nombres = Equipe::join('users', 'equipes.id', '=', 'users.equipe_id')
			->select('equipes.id as id', DB::raw("count(users.equipe_id) as count"))
			->groupBy('equipes.id')
			->get();
  
	return response()->json(["nombres"=>$nombres,
							 "equipes"=> $equipes,
							 "nmbrEquipe"=>$nmbrEquipe
							]);
});
//Stat pie
Route::get('/stat-pie-article',function(){

	$countArticle= DB::table('articles')
             ->select('id','type', DB::raw('count(type) as count'))
             ->groupBy('type')
             ->orderBy('id','asc')
             ->get();
    $type = Article::distinct('type')->pluck('type');
  
	return response()->json(["countArticle"=>$countArticle,
							 "type"=> $type
							]);
});
//Stat These
Route::get('/statThese',function(){

	$year = date('Y');

	$years = array();
	$debuThese = array();
	$finThese = array();
	for ($x = 10; $x>-1 ; $x--)
	{
	    $years[] = $year-$x;
	    $debuThese[] = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-$x)->count();
	    $finThese[] = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_soutenance,'%m/%d/%Y'),'%Y')"),$year-$x)->count();
	}
  
	return response()->json(["years"=>$years,
							 "debuThese"=> $debuThese,
							 "finThese"=> $finThese
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,
            
        ]);;

});



/* ---- Front Office ---- */

Route::get('/front','FrontController@index');
Route::get('/front/equipes','FrontController@equipes');
Route::get('/front/equipe/{id}','FrontController@equipe');
Route::get('/front/publications','FrontController@getAllPubs')->name('publications');
Route::get('front/profiles/{id}','FrontController@profiles');
Route::get('autocomplete','FrontController@autocomplete');
Route::get('/front/actualites','FrontController@actualites');
Route::get('front/actualites/{id}/details','FrontController@detailActual');
Route::get('/front/projets','FrontController@projets');
Route::get('/front/projet/{id}','FrontController@projet');
Route::get('/front/contact',function(){
	return view('front.contact');
});
Route::post('/front/contact','FrontController@contact');


Route::get('/front/presentation',function(){
	return view('front.presentation');
});
