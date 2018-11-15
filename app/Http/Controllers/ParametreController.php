<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use Auth;

class ParametreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
                return view('parametre',['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(Request $request)
    {
        // $labo = new Parametre();
        $labo =  Parametre::find('1');

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $labo->logo = '/uploads/photo/'.$file_name;
        }
        $labo->nom = $request->input('nom');

        $labo->save();

        return redirect('dashboard');

    }
}
