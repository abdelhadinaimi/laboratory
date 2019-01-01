<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Module;
use App\Cour;

class FrontCoursController extends Controller
{
      public function index($id)
    {
    	$membre = User::find($id);
    	$modules = Module::where('user_id', $id)->get();
    	return view('frontCours.module')->with([
            'membre' => $membre,
            'modules' => $modules
        ]);;
    }
    public function cours($id)
    {
    	$module = Module::find($id);
    	$cours = Cour::where('mod_id', $id)->get();
    	return view('frontCours.cours')->with([
            'module' => $module,
            'cours' => $cours
        ]);;

    }
    public function download($file_name) {
    $file_path = public_path('/uploads/cours/'.$file_name);
    return response()->download($file_path);
  }
}
