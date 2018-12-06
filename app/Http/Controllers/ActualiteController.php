<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Actualite;
use App\Parametre;
use App\Http\Requests\actualiteRequest;


class ActualiteController extends Controller
{
    public function index()
    {	
    	$labo = Parametre::find('1');
    	$listActualite = Actualite::all();
    	return view('actualite.index' , ['actualites' => $listActualite],['labo'=>$labo]);
    }
    public function create()
    {	
    	$labo = Parametre::find('1');
    	$listActualite = Actualite::all();
    	return view('actualite.ajouter' , ['actualites' => $listActualite],['labo'=>$labo]);
    }
    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$actualite = Actualite::find($id);

	 	return view('actualite.details')->with([
	 		'actualite' => $actualite,
	 		'labo'=>$labo,
	 	]);;
    }
    public function store(actualiteRequest $request){

	 	$actualite = new Actualite();
	 	$labo = Parametre::find('1');

	 	 if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="post.png";
        }
        

	 	$actualite->titre = $request->input('titre');
	 	$actualite->description = $request->input('description');
	 	$actualite->content = $request->input('content');
	 	$actualite->photo = 'uploads/photo/'.$file_name;
	 	
	 	
	 	$actualite->save();

  

	 	return redirect('actualites');

	 	//return response()->json(["arr"=>$request->input('membre')]);

    }
     public function edit($id){

	 	$actualite = Actualite::find($id);
	 	$labo = Parametre::find('1');


	 	return view('actualite.edit')->with([
	 		'actualite' => $actualite,
	 		'labo'=>$labo,
	 	]);;
    }
      public function update(actualiteRequest $request , $id)
    {
        $these = Actualite::find($id);
        $labo = Parametre::find('1');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        $actualite->titre = $request->input('titre');
	 	$actualite->description = $request->input('description');
	 	$actualite->content = $request->input('content');
	 	$actualite->photo = 'uploads/photo/'.$file_name;
	 	$actualite->save();

  

	 	return redirect('actualites');
    }
     public function destroy($id)
    {

        $actualite = Actualite::find($id);


        $actualite->delete();
        return redirect('actualites');
    }
}
