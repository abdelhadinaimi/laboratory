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
    	return view('frontCours.cours')->with([
            'membre' => $membre,
            'modules' => $modules
        ]);;
    }
}
