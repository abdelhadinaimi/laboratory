<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametre;
use App\Categorie;
use App\Materiel;
use App\Equipe;
use App\User;
use App\MaterielMembre;
use App\MaterielEquipe;
use Carbon\Carbon;
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
	                    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCat('.$categorie->id.',\''.$categorie->libelle.'\');" style="cursor:pointer;"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
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
                       <li><a type="button" data-toggle="modal" data-target="#removeMatModal" id="removeMaterielsModalBtn" onclick="removeMat('.$materiel->id.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>';
                     
                 if($materiel->etat==0){
                  $button_Action=$button_Action.'<li><a type="button" data-toggle="modal" data-target="#affecterMatModal" id="affecterMaterielsModalBtn" onclick="affecterMat('.$materiel->id.');"> <i class="glyphicon glyphicon-export"></i> Affecter</a></li>          
                     </ul>
                 </div>';
                 }
                 else{
                  $button_Action=$button_Action.'</ul></div>';
                 }
            $output['data'][] = array(
               $materiel->id,
                $materiel->reference,
               $materiel->categorie->libelle,
               $materiel->description,
               ($materiel->etat==0)?"Disponible":"Affecté",
              $button_Action   
            ); 
        }
      return response()->json($output);
    }

    public function createMateriel(Request $request){
        $Materiel = new Materiel();
        $Materiel->categorie_id = $request->input('catMat');
        $Materiel->reference = strtoupper($request->input('RefMat'));
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
         $materiel->reference = strtoupper($request->input('RefMatEdit'));
         $materiel->description = $request->input('DescMatEdit');
         $materiel->save();
         return response()->json(array('success' => true,'message' => "Materiel mis à jour"));
    }

    public function getMat($id){
        $output = array('data' => array());
        $materiel = Materiel::find($id);
       
            $output['data'][] = array(
                $materiel->reference,
               $materiel->categorie->id,
               $materiel->description,
            ); 

              return response()->json($output);

        }
       public function getSmallCat(){
        $output = array('data' => array());
        $categories = Categorie::all();
        foreach ($categories as $categorie)
        {
            $output['data'][] = array(
               $categorie->id,
                $categorie->libelle,
                
            ); 
        }
      return response()->json($output);
    }

        public function getEquipes(){
        $output = array('data' => array());
        $equipes = Equipe::all();
        foreach ($equipes as $equipe)
        {
            $output['data'][] = array(
               $equipe->id,
                $equipe->achronymes,
                
            ); 
        }
      return response()->json($output);
    }

    public function getMembres(){
        $output = array('data' => array());
        $membres = User::all();
        foreach ($membres as $membre)
        {
            $output['data'][] = array(
               $membre->id,
                $membre->name,
                $membre->prenom,
            ); 
        }
      return response()->json($output);
    }



        public function getHistoriqueMembres(){
            $output = array('data' => array());
            $affectMembres = MaterielMembre::all();
          foreach ($affectMembres as $affectMembre)
          {
             $button_Action = '<!-- Single button -->
                  <div class="btn-group">
                      <button type="button" class="btn btn-default  data-target="#rendreMaterielsModal" dropdown-toggle" id="rendreMaterielsModalBtn" data-toggle="modal" aria-haspopup="true" aria-expanded="false" onclick="rendre('.$affectMembre->materiel_id.');">
                          <i class="glyphicon glyphicon-import"></i> Rendre
                      </button>
                 </div>';
            $output['data'][] = array(
               $affectMembre->materiel->reference,
               $affectMembre->materiel->categorie->libelle,
               $affectMembre->user->name." ".$affectMembre->user->prenom,
               $affectMembre->date,
               $button_Action
            ); 
          }

              return response()->json($output);

    }
       public function getHistoriqueEquipes(){
            $output = array('data' => array());
            $affectEquipes = MaterielEquipe::all();
          foreach ($affectEquipes as $affectEquipe)
          {
             $button_Action = '<!-- Single button -->
                  <div class="btn-group">
                      <button type="button" class="btn btn-default  data-target="#rendreMaterielsModal" dropdown-toggle" id="rendreMaterielsModalBtn" data-toggle="modal" aria-haspopup="true" aria-expanded="false" onclick="rendre('.$affectEquipe->materiel_id.');">
                          <i class="glyphicon glyphicon-import"></i> Rendre
                      </button>
                 </div>';
            $output['data'][] = array(
               $affectEquipe->materiel->reference,
               $affectEquipe->materiel->categorie->libelle,
               $affectEquipe->equipe->achronymes,
               $affectEquipe->date,
               $button_Action
            ); 
          }

              return response()->json($output);

    }

    /*public function affecterForEquipe($id,Request $request){
        $Materiel = new MaterielMembre();
        $Materiel->categorie_id = $request->input('catMat');
        $Materiel->reference = strtoupper($request->input('RefMat'));
        $Materiel->description = $request->input('DescMat');
        $Materiel->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }*/
    public function affecterForMembre($id,Request $request){
        $Materiel = new MaterielMembre();
        $Materiel->materiel_id = $id;
        $Materiel->user_id = $request->input('membreSelected');
        $Materiel->date = Carbon::now();
        $Materiel->save();
        Materiel::where('id', $id)->update( array('etat'=>'1'));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }
    

}
