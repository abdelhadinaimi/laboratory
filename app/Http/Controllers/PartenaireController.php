<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use App\Partenaire;
use App\Http\Requests\PartenaireRequest;

class PartenaireController extends Controller
{
    public function index()
    {
    	$labo = Parametre::find('1');
        return view('partenaire.index')->with([
            'labo' => $labo,
        ]);;
    }

    public function all(){
        $output = array('data' => array());
        $partenaires = Partenaire::all();
        $i = 0;
        foreach ($partenaires as $partenaire)
        {
            $button_Action = 
            '<!-- Single button -->
	              <div class="btn-group">
	                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      Action <span class="caret"></span>
	                  </button>
	                 <ul class="dropdown-menu">
	                    <li><a type="button" data-toggle="modal" id="editPartenairesModalBtn" data-target="#editPartenairesModal" onclick="editPart('.$i.');"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
	                   <li><a type="button" data-toggle="modal" data-target="#removePartenairesModal" id="removePartenairesModalBtn" onclick="removePart('.$i.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
	                 </ul>
	             </div>';
        	$output['data'][] = array(
                $partenaire->id,
                $partenaire->nom,
                $partenaire->type,
                $partenaire->description,
                $partenaire->email,
                $partenaire->num_tel,
                $partenaire->pays,
                $partenaire->ville,
 		        $button_Action	
             ); 
            $i++;
        }
      return response()->json($output);
    }

    public function create(PartenaireRequest $request)
    {
        $validated = $request->validated();
        $partenaire = new Partenaire();

        $partenaire->nom = $validated['nom'];
        $partenaire->description = $validated['description'];
        $partenaire->type = $validated['type'];
        $partenaire->email = $validated['email'];
        $partenaire->num_tel = $validated['num_tel'];
        $partenaire->pays = $validated['pays'];
        $partenaire->ville = $validated['ville'];

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = 'part' . time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="partenaire.png";
        }
        $partenaire->photo = 'uploads/photo/'.$file_name;
        $partenaire->save();
        $valid = array("success" => true);
        return response()->json($valid);
    }

    public function edit($id,PartenaireRequest $request){
        $validated = $request->validated();
        $partenaire = Partenaire::find($id);

        $partenaire->nom = $validated['nom'];
        $partenaire->description = $validated['description'];
        $partenaire->type = $validated['type'];
        $partenaire->email = $validated['email'];
        $partenaire->num_tel = $validated['num_tel'];
        $partenaire->pays = $validated['pays'];
        $partenaire->ville = $validated['ville'];

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = 'part' . time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="partenaire.png";
        }
        $partenaire->photo = 'uploads/photo/'.$file_name;
        $partenaire->save();
        $valid = array("success" => true);
        return response()->json($valid);
    }

    public function delete($id){
        $partenaire = Partenaire::destroy($id);
        $valid = array("success" => true);
        return response()->json($valid);
    }

}
