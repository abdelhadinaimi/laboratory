<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cour;
use App\Parametre;
use App\Module;
class CourController extends Controller
{
    public function index($id)
    {
    	$labo = Parametre::find('1');
        $cours = Cour::where('id_mod','=',$id);
        $module = Module::where('id','=',$id)->first();
        return view('modules.cours')->with([
            'labo' => $labo,'cours' => $cours,'module' => $module
        ]);
    }
    public function getCours($idMod){
        $output = array('data' => array());
        $cours = Cour::where('mod_id','=',$idMod)->get();
        foreach ($cours as $cour)
        {
            $button_Action = '<!-- Single button -->
                  <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCoursModal" onclick="editCat('.$cour->id.',\''.$cour->libelle.'\',\''.$cour->description.'\',\''.$cour->pub_time.'\',\''.$cour->joins.'\');" style="cursor:pointer;"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeCoursModal" id="removeCourModalBtn" onclick="removeCat('.$cour->id.');" style="cursor:pointer;"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
                     </ul>
                 </div>';
                 $desc = ($cour->description == "") ? "pas de description" : $cour->description;
            $output['data'][] = array(      
               $cour->libelle,
               $desc/*,
               "<a href = '".asset($cour->fiche)."' target='_blank'>lien du cours</a>"*/,
               $button_Action   
            ); 
        }
      return response()->json($output);
    }
    public function createCour(Request $request,$id){
        $cour = new Cour();
        $cour->libelle = $request->input('coursLib');
        $cour->description = $request->input('coursDesc');
        $cour->mod_id = $id;
        $fls = "";
        /*if($request->hasFile('fiche')){
            $file = $request->file('fiche');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/cours/'),$cour->libelle);
            $cour->fiche = '/uploads/cours/'.$cour->libelle;
        }*/
        if($request->hasFile('joins')){
            $files = $request->file('joins');
            foreach ($files as $file) {
              $file_name = $file->getClientOriginalName();
            $file->move(public_path('/uploads/cours/'),$file_name);
            $fls.='/uploads/cours/'.$file_name.',';
            }
            $fls = substr($fls,0,-1);
            $cour->joins = $fls;
        }
           $cour->pub_time = $request->input('pubTime');
           $cour->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "Ajout réussi";
        return response()->json($valid);
    }
    function deleteCour($idCours){
      Cour::destroy($idCours);
      $valid['success'] = array('success' => false, 'messages' => array());
      $valid['success'] = true;
      $valid['messages'] = "Suppression Effectuée";  
      return response()->json($valid);
    }
    function editCour($id,Request $request){
         $cour = Cour::find($id);
         $start ="";
         if($cour->joins != "0")
              $start = $cour->joins;
         $cour->libelle = $request->input('editCoursLib');
         $cour->description = $request->input('editCoursDesc');
         if($request->input('editPubTime') != null)
            $cour->pub_time = $request->input('editPubTime');
        $fls = "";
        /*if($request->hasFile('editFiche')){
            $file = $request->file('editFiche');
          if($file != null)
            {
              $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('/uploads/cours/'),$file_name);
              $cour->fiche = '/uploads/cours/'.$file_name;
            }
        }*/
        if($request->hasFile('editJoins')){
            $files = $request->file('editJoins');
            foreach ($files as $file) {
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('/uploads/cours/'),$file_name);
            $fls.='/uploads/cours/'.$file_name.',';
            }
            if($fls != "")
               {
                $fls = substr($fls,0,-1);
                if($start != "")
                   $cour->joins = $start.','.$fls;
                else
                   $cour->joins = $fls;
               }
        }

         $cour->save();
         return response()->json(array('success' => true,'message' => "la liste des chapitres est mise à Jour",'joins' => $cour->joins));
    }
    function deleteFiche($ficheSupp,$idCours){
      $cour = Cour::find($idCours);
      $joins = explode(",",$cour->joins);
      if(sizeof($joins) == 0)
          {
            $cour->joins = "";
            $cour->save();
          }
      else
      {
      $nvChaine = "";
      for ($i=0; $i < sizeof($joins) ; $i++) { 
        if($i != $ficheSupp)
            $nvChaine .= $joins[$i].",";      
      }
       $nvChaine = substr($nvChaine,0,-1);
      $cour->joins = $nvChaine;
      $cour->save();
    }
      return response()->json(array('success' => true,'message' => "success"));
    }
}
