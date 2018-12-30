<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Parametre;
use App\Stage;
use App\Contact;

use App\Partenaire;
use App\Http\Requests\PartenaireRequest;
class StageController extends Controller
{
    public function index()
    {
    	$labo = Parametre::find('1');
        return view('stages.index')->with([
            'labo' => $labo,
        ]);;
    }

    public function getStages(){
    	$output = array('data' => array());
        $stages = Stage::all();
        foreach ($stages as $stage)
        {
        	$button_Action = '<!-- Single button -->
	              <div class="btn-group">
	                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      Action <span class="caret"></span>
	                  </button>
	                 <ul class="dropdown-menu">
	                    <li><a type="button" data-toggle="modal" id="editStageModalBtn" data-target="#editStageModal" onclick="editStage('.$stage->id.',\''.$stage->stagiaire->id.'\',\''.$stage->partenaire->id.'\',\''.$stage->contact->id.'\',\''.$stage->dateDebut.'\',\''.$stage->dateFin.'\');" style="cursor:pointer;"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
	                   <li><a type="button" data-toggle="modal" data-target="#removeStageModal" id="removeStageBtn" onclick="removeStage('.$stage->id.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
	                 </ul>
	             </div>';
        	$output['data'][] = array(
 		       $stage->stagiaire->name." ".$stage->stagiaire->prenom,
 		       $stage->partenaire->nom,
 		       $stage->contact->nom." ".$stage->contact->prenom,
 		       $stage->dateDebut,
 		       $stage->dateFin,
 		       $button_Action	
 		    ); 
        }
      return response()->json($output);
    }
    function deleteStage(Request $request){
        Stage::destroy($request->input('idStage'));
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }
    public function getListPartenaires(){
        $output = array('data' => array());
        $partenaires = Partenaire::all();
        foreach ($partenaires as $partenaire)
        {
            $output['data'][] = array(
               $partenaire->id,
                $partenaire->nom,
                
            ); 
        }
      return response()->json($output);
    }
    public function getListContacts($id){
        $output = array('data' => array());
        $contacts = Contact::where('partenaire_id', $id)->get();
        foreach ($contacts as $contact)
        {
            $output['data'][] = array(
               $contact->id,
                $contact->nom." ".$contact->prenom
                
            ); 
        }
      return response()->json($output);
    }

      public function createStage(Request $request){
        $Stage = new Stage();
        $Stage->stagiaire_id = $request->input('stagiaire');
        $Stage->partenaire_id = $request->input('partenaire');
        $Stage->contact_id = $request->input('contact');
        $Stage->dateDebut = $request->input('dateDebutStage');
        $Stage->dateFin = $request->input('dateFinStage');
        $Stage->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";    
        return response()->json($valid);
    }

     function editStage($id,Request $request){
         $stage = Stage::find($id);
         $stage->stagiaire_id = $request->input('stagiaireEdit');
         $stage->partenaire_id = $request->input('partenaireEdit');
         $stage->contact_id = $request->input('contactEdit');
         $stage->dateDebut = $request->input('dateDebutStageEdit');
         $stage->dateFin = $request->input('dateFinStageEdit');
         $stage->save();
         return response()->json(array('success' => true,'message' => "Stage mis à jour"));
    }
}
