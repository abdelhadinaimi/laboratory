<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use App\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    public function all(){
        $output = array('data' => array());
        $contacts = Contact::all();
        $i = 0;
        foreach ($contacts as $contact)
        {
            $button_Action = 
            '<!-- Single button -->
	              <div class="btn-group">
	                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                      Action <span class="caret"></span>
	                  </button>
	                 <ul class="dropdown-menu">
	                    <li><a type="button" data-toggle="modal" id="editContactsModalBtn" data-target="#editContactsModal" onclick="editCont('.$i.');"> <i class="glyphicon glyphicon-edit"></i> Editer</a></li>
	                   <li><a type="button" data-toggle="modal" data-target="#removeContactsModal" id="removeContactsModalBtn" onclick="removeCont('.$contact->id.');"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>          
	                 </ul>
	             </div>';
        	$output['data'][] = array(
                $contact->id,
                $contact->nom,
                $contact->prenom,
                $contact->fonction,
                $contact->nature,
                $contact->email,
                $contact->num_tel,
                $contact->description,
                $contact->partenaire->nom,
                $contact->partenaire->id,
 		        $button_Action	
             ); 
            $i++;
        }
      return response()->json($output);
    }

    public function create(ContactRequest $request)
    {
        $validated = $request->validated();
        $contact = new Contact();

        $contact->nom = $validated['nom'];
        $contact->prenom = $validated['prenom'];
        $contact->fonction = $validated['fonction'];
        $contact->nature = $validated['nature'];
        $contact->email = $validated['email'];
        $contact->num_tel = $validated['num_tel'];
        $contact->description = $validated['description'];
        $contact->partenaire_id = $validated['partenaire_id'];
        $contact->save();
        $valid = array("success" => true);
        return response()->json($valid);
    }

    public function edit($id,ContactRequest $request){
        $validated = $request->validated();
        $contact = Contact::find($id);

        $contact->nom = $validated['nom'];
        $contact->prenom = $validated['prenom'];
        $contact->fonction = $validated['fonction'];
        $contact->nature = $validated['nature'];
        $contact->email = $validated['email'];
        $contact->num_tel = $validated['num_tel'];
        $contact->description = $validated['description'];
        $contact->partenaire_id = $validated['partenaire_id'];
        $contact->save();
        $valid = array("success" => true);
        return response()->json($valid);
    }

    public function delete($id){
        $contact = Contact::destroy($id);
        $valid = array("success" => true);
        return response()->json($valid);
    }
}
