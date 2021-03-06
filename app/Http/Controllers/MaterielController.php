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
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCat('.$categorie->id.',\''.$categorie->libelle.'\');" style="cursor:pointer;"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCat('.$categorie->id.');" style="cursor:pointer;"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
                     </ul>
                 </div>';
                 $count = Materiel::where('categorie_id','=',$categorie->id)->count();
                 $label="";
                  if($count > 0)
                     $label = "<span class='label label-success'>Dispoible</span>";
                 else
                     $label = "<span class='label label-danger'>Non Dispo</span>";
            $output['data'][] = array(      
               $categorie->libelle,
               $count,
               $label,
               $button_Action   
            ); 
        }
      return response()->json($output);
    }
    public function createCategorie(Request $request){
        $categorie = Categorie::firstOrNew([
         'libelle' => $request->input('catLib')
        ]);
        if(!$categorie->id)
          {
           $categorie->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "Ajout réussi";
           }
        else
        {
            $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = false;
           $valid['messages'] = "Ajout échoué Catégorie déja existe";
        }

        return response()->json($valid);
    }
    function deleteCategorie(Request $request){
    	Categorie::destroy($request->input('idCat'));
    	$valid['success'] = array('success' => false, 'messages' => array());
	 	$valid['success'] = true;
		$valid['messages'] = "Suppression Effectuée";	
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
                $materiel->reference,
               ($materiel->categorie!=null)?$materiel->categorie->libelle:"",
               $materiel->description,
               ($materiel->etat==0)?"<h4><span class=\" col-md-4 label label-success\">Libre</span></h4>":"<h4><span class=\" col-md-4 label label-danger\">Affecté</span></h4>",
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
                      <button type="button" class="btn btn-default"  data-target="#rendreMaterielsMembres" dropdown-toggle" onclick="rendreMatMembre('.$affectMembre->materiel_id.',\''.$affectMembre->id.'\');" id="rendreMaterielsModalBtn" data-toggle="modal" aria-haspopup="true" aria-expanded="false" >
                          <i class="glyphicon glyphicon-import"></i> Libérer
                      </button>
                 </div>';
            $output['data'][] = array(
               //rendre('.$affectMembre->materiel_id.');
               $affectMembre->materiel->reference,
               $affectMembre->materiel->categorie->libelle,
               $affectMembre->user->name." ".$affectMembre->user->prenom,
               $affectMembre->dateAffectation,
               $affectMembre->dateRetour,
               (($affectMembre->materiel->etat==1) && ($affectMembre->dateRetour==null) )?$button_Action:""
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
                      <button type="button" class="btn btn-default"  data-target="#rendreMaterielsEquipes" dropdown-toggle" id="rendreMaterielsModalBtn" data-toggle="modal" aria-haspopup="true" aria-expanded="false" onclick="rendreMatEquipe('.$affectEquipe->materiel_id.',\''.$affectEquipe->id.'\');">
                          <i class="glyphicon glyphicon-import"></i> Libérer
                      </button>
                 </div>';
            $output['data'][] = array(
               $affectEquipe->materiel->reference,
               $affectEquipe->materiel->categorie->libelle,
               $affectEquipe->equipe->achronymes,
               $affectEquipe->dateAffectation,
               $affectEquipe->dateRetour,
               (($affectEquipe->materiel->etat==1) && ($affectEquipe->dateRetour==null) )?$button_Action:""
            ); 
          }

              return response()->json($output);

    }

    public function affecterForEquipe($id,Request $request){
        $Materiel = new MaterielEquipe();
        $Materiel->materiel_id = $id;
        $Materiel->equipe_id = $request->input('selected');
        $Materiel->dateAffectation = $request->input('dateAFF');
        $Materiel->save();
        Materiel::where('id', $id)->update( array('etat'=>'1'));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }
    public function affecterForMembre($id,Request $request){
        $Materiel = new MaterielMembre();
        $Materiel->materiel_id = $id;
        $Materiel->user_id = $request->input('selected');
        $Materiel->dateAffectation = $request->input('dateAFF');
        $Materiel->save();
        Materiel::where('id', $id)->update( array('etat'=>'1'));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }
    
    public function rendreFromMembre($id,Request $request){
        Materiel::where('id', $id)->update( array('etat'=>'0'));
        $affectLineM = $request->input('affectLineM');
        $dateRND = $request->input('dateRND');

        MaterielMembre::where('id', $affectLineM)->update( array('dateRetour'=>$dateRND));

        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "opération réussie";    
        return response()->json($valid);
    }

    public function rendreFromEquipe($id,Request $request){
       Materiel::where('id', $id)->update( array('etat'=>'0'));
        $affectLineE = $request->input('affectLineE');
        $dateRNDE = $request->input('dateRNDE');
        MaterielEquipe::where('id', $affectLineE)->update( array('dateRetour'=>$dateRNDE));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "opération réussie";    
        return response()->json($valid);
    }

}
