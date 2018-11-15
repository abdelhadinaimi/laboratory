<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Parametre;
use App\User;
use App\Equipe;
use App\Role;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $membres = User::all(); 
        $labo = Parametre::find('1');

        return view('membre.index' , ['membres' => $membres],['labo'=>$labo]);
    }

    public function trombi()
    {
        // $membres = User::all()->orderBy('name'); 
        $labo = Parametre::find('1');
        $membres = DB::table('users')->distinct('id')->orderBy('name')->get(); 

        return view('membre.trombinoscope', ['membres' => $membres],['labo'=>$labo]);
    } 

    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('membre.details')->with([
            'membre' => $membre,
            'equipes' => $equipes,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    } 

    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
                $equipes = Equipe::all();
                return view('membre.create' , ['equipes' => $equipes],['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(userRequest $request)
    {
        $membre = new User();
        $labo = Parametre::find('1');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="userDefault.png";
        }

            $membre->name = $request->input('name');
            $membre->prenom = $request->input('prenom');
            $membre->email = $request->input('email');
            $membre->date_naissance = $request->input('date_naissance');
            $membre->grade = $request->input('grade');
            $membre->password = Hash::make($request->input('password'));
            $membre->equipe_id = $request->input('equipe');
            $membre->num_tel = $request->input('num_tel');
            // $membre->autorisation_public_linkedin = $request->input('autorisation_public_linkedin');
            $membre->autorisation_public_num_tel = $request->input('autorisation_public_num_tel');
            $membre->autorisation_public_photo = $request->input('autorisation_public_photo');
            $membre->autorisation_public_date_naiss = $request->input('autorisation_public_date_naiss');
            // $membre->autorisation_public_rg = $request->input('autorisation_public_rg');
            $membre->lien_rg = $request->input('lien_rg');
            $membre->lien_linkedin = $request->input('lien_linkedin');
            $membre->photo = 'uploads/photo/'.$file_name;

            $membre->save();
        return redirect('membres');

    }

    public function edit($id)
    {

        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('membre.edit')->with([
            'membre' => $membre,
            'equipes' => $equipes,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    
    }

    public function update(userEditRequest $request , $id)
    {
      
        $membre = User::find($id);
        $labo = Parametre::find('1');
        
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

                        }

        $membre->name = $request->input('name');
        $membre->prenom = $request->input('prenom');
        $membre->email = $request->input('email');
        $membre->date_naissance = $request->input('date_naissance');
        $membre->grade = $request->input('grade');
                if((Auth::id() == $membre->id))
                {
                $membre->password =Hash::make($request->input('password'));
                }
        $membre->equipe_id = $request->input('equipe_id');
        $membre->num_tel = $request->input('num_tel');
       
        $membre->autorisation_public_num_tel = $request->input('autorisation_public_num_tel');
        $membre->autorisation_public_photo = $request->input('autorisation_public_photo');
        $membre->autorisation_public_date_naiss = $request->input('autorisation_public_date_naiss');

        $membre->lien_rg = $request->input('lien_rg');
        $membre->lien_linkedin = $request->input('lien_linkedin');
        if ((Auth::user()->role->nom == 'admin')&& (Auth::id() != $membre->id))
            {
          $membre->role_id = $request->role_id;
            }
          
        $membre->save();

        return redirect('membres/'.$id.'/details');

    }

    
    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $membre = User::find($id);
        $membre->delete();
        return redirect('membres');
            }
    }
    
}
