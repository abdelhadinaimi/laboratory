<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Cour;
use App\Parametre;
use Illuminate\Support\Facades\Auth;
class ModuleController extends Controller
{
    public function index()
    {
    	$labo = Parametre::find('1');
        $modules = Module::all();
        return view('modules.modules')->with([
            'labo' => $labo,'modules' => $modules,
        ]);;
    }
    public function createModule(Request $request){
        
        $module = Module::firstOrNew([
         'libelle' => $request->input('modLib')
        ]);
        if(!$module->id)
          {
           $module->description = $request->input('descMod');
           $module->user_id = Auth::user()->id;
           $module->save();
           $fragment = '<div class="col-lg-4 col-xs-6" id="'.$module->id.'">
                <div class="small-box bg-green">
                    <i class="glyphicon glyphicon-edit editMod" role="'.$module->id.'" data-toggle="modal" data-target="#editModModal"></i> <i class="glyphicon glyphicon-trash removeMod" role="'.$module->id.'" data-toggle="modal" data-target="#removeModModal"></i>
                   <div class="inner">
                      <h3>'.$module->libelle.'<sup style="font-size: 20px"></sup></h3>
                      <p>'.$module->description.'</p>
                  </div>
                   <div class="icon">
                      <i class="ion-ios-paper"></i>
                   </div>
                    <a href="module/'.$module->id.'" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>';
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $fragment;
           }
        else
        {
            $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = false;
           $valid['messages'] = "Ajout échoué Module déja existe";
        }

        return response()->json($valid);
    }
    function deleteModule(Request $request){
      $module = Module::find($request->input('idMod'));
      $cours = Cour::where('mod_id','=',$module->id)->get();
      foreach ($cours as $cour) {
        $cour->delete();
      }
     $module->delete();
    	$valid['success'] = array('success' => false, 'messages' => array());
	 	$valid['success'] = true;
		$valid['messages'] = "Suppression Effectuée";	
	    return response()->json($valid);
    }
    function editModule($id,Request $request){
         $module = Module::find($id);
         $module->libelle = $request->input('nvModLib');
         $module->description = $request->input('nvModDesc');
         $module->save();
         return response()->json(array('success' => true,'message' => "Module Mis à Jour"));
    }
}
