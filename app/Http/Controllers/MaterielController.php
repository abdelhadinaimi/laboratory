<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametre;
use App\Categorie;
use App\Materiel;
class MaterielController extends Controller
{
    public function index()
    {
    	$labo = Parametre::find('1');
        $categories = Categorie::all();
        return view('materiels.index')->with([
            'labo' => $labo,'categories' => $categories,
        ]);;
    }
    public function getCategories(){
    	$output = array('data' => array());
        $categories = Categorie::all();
        foreach ($categories as $categorie)
        {
        	$button_Action = '<!-- Single button -->
	              <div class="btn-group">
	                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      Action <span class="caret"></span>
	                  </button>
	                 <ul class="dropdown-menu">
	                    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCat('.$categorie->id.');"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
	                   <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCat('.$categorie->id.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
	                 </ul>
	             </div>';
        	$output['data'][] = array( 		
 		       $categorie->libelle,
 		       $button_Action	
 		    ); 
        }
      return response()->json($output);
    }
    public function createCategorie(Request $request){
    	$categorie = new Categorie();
    	$categorie->libelle = $request->input('catLib');
    	$categorie->save();
    	$valid['success'] = array('success' => false, 'messages' => array());
	 	$valid['success'] = true;
		$valid['messages'] = "Ajout réussi";	
	    return response()->json($valid);
    }
    function deleteCategorie(Request $request){
    	Categorie::destroy($request->input('idCat'));
    	$valid['success'] = array('success' => false, 'messages' => array());
	 	$valid['success'] = true;
		$valid['messages'] = "Ajout réussi";	
	    return response()->json($valid);
    }
    function editCategorie($id,Request $request){
         $categorie = Categorie::find($id);
         $categorie->libelle = $request->input('catLib');
         $categorie->save();
         return response()->json(array('success' => true,'message' => "Categorie Mise à Jour"));
    }
    //-----------------------------------------Materiels---------------------------------------------
    public function getMateriels(){
        $output = array('data' => array());
        $materiels = Materiel::all();
        foreach ($materiels as $materiel)
        {
            $button_Action = '<!-- Single button -->
                  <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="editMaterielsModalBtn" data-target="#editMaterielsModal" onclick="editMat('.$materiel->id.');"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeMatModal" id="removeMaterielsModalBtn" onclick="removeMat('.$materiel->id.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
                     </ul>
                 </div>';
            $output['data'][] = array(
               $materiel->id,
                $materiel->reference,
               $materiel->categorie->libelle,
               $materiel->description,
               $button_Action   
            ); 
        }
      return response()->json($output);
    }

    public function createMateriel(Request $request){
        $Materiel = new Materiel();
        $Materiel->categorie_id = $request->input('catMat');
        $Materiel->reference = $request->input('RefMat');
        $Materiel->description = $request->input('DescMat');
        $Materiel->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }

    function deleteMateriel(Request $request){
        Materiel::destroy($request->input('idMat'));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }

     function editMateriel($id,Request $request){
         $materiel = Materiel::find($id);
         $materiel->categorie_id = $request->input('selectCatEdit');
         $materiel->reference = $request->input('RefMatEdit');
         $materiel->description = $request->input('DescMatEdit');
         $materiel->save();
         return response()->json(array('success' => true,'message' => "Materiel mis à jour"));
    }
}
