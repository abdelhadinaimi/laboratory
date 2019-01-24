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
Route::get('getSmallCat','MaterielController@getSmallCat');
Route::get('getAffecterEquipes','MaterielController@getEquipes');
Route::get('getAffecterMembres','MaterielController@getMembres');
Route::get('getHistoriqueMembres','MaterielController@getHistoriqueMembres');
Route::get('getHistoriqueEquipes','MaterielController@getHistoriqueEquipes');

//Traitement modulesdeleteMod
Route::get('modules','ModuleController@index');
Route::post('createModule','ModuleController@createModule');
Route::post('deleteModule','ModuleController@deleteModule');
Route::post('editMod/{id}','ModuleController@editModule');
Route::get('module/{id}','CourController@index');
Route::get('module/getCours/{id}','CourController@getCours');
Route::post('module/createCours/{id}','CourController@createCour');
Route::post('module/deleteCour/{idCours}','CourController@deleteCour');
Route::post('module/editCour/{id}','CourController@editCour');

Route::post('createCat','MaterielController@createCategorie');
Route::post('createMat','MaterielController@createMateriel');

Route::post('affecterForMembre/{id}','MaterielController@affecterForMembre');
Route::post('affecterForEquipe/{id}','MaterielController@affecterForEquipe');

Route::post('rendreFromMembre/{id}','MaterielController@rendreFromMembre');
Route::post('rendreFromEquipe/{id}','MaterielController@rendreFromEquipe');


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


Route::get('stages','StageController@index');
Route::get('getStages','StageController@getStages');
Route::post('deleteStage','StageController@deleteStage');
Route::post('createStage','StageController@createStage');
Route::post('editStage/{id}','StageController@editStage');



Route::get('getListPartenaires','StageController@getListPartenaires');
Route::get('getListContacts/{id}','StageController@getListContacts');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics',function(){
    $year = date('Y');
    $years = array();
    $equipes = Equipe::pluck('intitule');
    for ($x = 10; $x>=0 ; $x--)
    {
        $years[] = $year-$x;

    }
    $nombres = Equipe::join('users', 'equipes.id', '=', 'users.equipe_id')
        ->join('projet_user','projet_user.user_id','=','users.id')
        ->join('projets','projets.id','=','projet_user.projet_id')
        ->whereOr('projets.chef_id','=','users.id')
        ->select('equipes.id as id','equipes.intitule as intitule', DB::raw("count(DISTINCT  projet_user.projet_id) as count"),DB::raw('YEAR(projets.created_at) year'))
        ->groupBy('equipes.id','intitule','year')
        ->get();


    return response()->json(["nombres"=>$nombres,
        "equipes"=>$equipes,
        "years"=>$years
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
        ->select('equipes.id as id','equipes.intitule as intitule', DB::raw("count(distinct articles.id) as count"),DB::raw('YEAR(articles.created_at) year'))
        ->groupBy('equipes.id','intitule','year')
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
        ->groupBy('id','type','annee')
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
        ->select('type', DB::raw('count(type) as count'))
        ->groupBy('type')
        ->get();


    return response()->json(["countArticle"=>$countArticle
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
        $debuThese[] = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),"<=",$year-$x)
            ->WhereNull(DB::raw("date_soutenance"))->count();
        $finThese[] = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_soutenance,'%m/%d/%Y'),'%Y')"),$year-$x)->count();
    }
    $these = DB::table('theses')
        ->select(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') as year"), DB::raw('count(*) as count'))
        ->groupBy('year')
        ->get();
    return response()->json(["years"=>$years,
        "debuThese"=> $debuThese,
        "finThese"=> $finThese,
        "these"=>$these
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
    $labo = Parametre::find('1');

    return view('front.contact')->with([
        'labo'=>$labo,

    ]);;
});
Route::post('/front/contact','FrontController@contact');


Route::get('/front/presentation',function(){
    $labo = Parametre::find('1');
    return view('front.presentation')->with([
        'labo'=>$labo,

    ]);;
});

/* ----- front cours ----- */
Route::get('/frontCours/{id}','FrontCoursController@index');
Route::get('/frontCours/module/{id}','FrontCoursController@cours');
Route::get('/frontCours/module/download/{file}', 'FrontCoursController@download');

