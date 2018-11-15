<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\These;
use App\Parametre;
use App\User;
use Auth;
use App\Http\Requests\theseRequest;
use Illuminate\Http\UploadedFile;



class TheseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $theses = These::all(); 
        $labo = Parametre::find('1');

        return view('these.index' , ['theses' => $theses] , ['labo'=>$labo]);
    }

    public function details($id)
    {
        $these = These::find($id);
        $labo = Parametre::find('1');

        return view('these.details', ['these' => $these], ['labo'=>$labo]);
    } 

    public function create()
    {
        if( Auth::user()->role->nom == 'admin')
            {
                $membres = User::all();
                $these = These::all();
                $labo = Parametre::find('1');
                return view('these.ajouter',['membres'=>$membres], ['labo'=>$labo]);
            }
            else{
                $labo = Parametre::find('1');
                return view('errors.403', ['labo'=>$labo]);
            }
    
    }

    public function store(theseRequest $request)
    {
        $labo = Parametre::find('1');
        $these = new These();

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $these->detail = '/uploads/these/'.$file_name;

        }

        $these->titre = $request->input('titre');
        $these->sujet = $request->input('sujet');
        $these->date_debut = $request->input('date_debut');
        
        $these->date_soutenance = $request->input('date_soutenance');
        $these->encadreur_ext = $request->input('encadreur_ext');
        $these->encadreur_int = $request->input('encadreur_int');
        $these->coencadreur_ext = $request->input('coencadreur_ext');
        $these->coencadreur_int = $request->input('coencadreur_int');
        $these->user_id = $request->input('user_id');
        


        $these->save();

        return redirect('theses');

    }
    
    public function edit($id)
    {
        $labo = Parametre::find('1');
        //if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin')
            {
        $these = These::find($id);
        $membres = User::all();

        $this->authorize('update', $these);

        return view('these.edit')->with([ 
            'these' => $these,
            'membres'=>$membres,
            'labo'=>$labo,
        ]);;
            }
    }
    public function update(theseRequest $request , $id)
    {
        $these = These::find($id);
        $labo = Parametre::find('1');

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $these->detail = '/uploads/these/'.$file_name;

        }
        
        $these->titre = $request->input('titre');
        $these->sujet = $request->input('sujet');
        $these->date_debut = $request->input('date_debut');
        $these->date_soutenance = $request->input('date_soutenance');
        $these->encadreur_ext = $request->input('encadreur_ext');
        $these->encadreur_int = $request->input('encadreur_int');
        $these->coencadreur_ext = $request->input('coencadreur_ext');
        $these->coencadreur_int = $request->input('coencadreur_int');
        $these->user_id = $request->input('user_id');

        $these->save();

        return redirect('theses');

    }
    public function destroy($id)
    {

        $these = These::find($id);

        $this->authorize('delete', $these);

        $these->delete();
        return redirect('theses');
    }

}
