<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametre;
use App\Categorie;
class MaterielController extends Controller
{
    public function index()
    {
    	$labo = Parametre::find('1');
        return view('materiels.index')->with([
            'labo' => $labo,
        ]);;
    }
    public function getCategories(){
    	$output = array('data' => array());
        $categories = Categorie::all();
        foreach ($categories as $categorie)
        {
        	$output['data'][] = array( 		
 		       $categorie->libelle,
 		       "lon"	
 		    ); 
        }
      return response()->json($output);
    }
}
