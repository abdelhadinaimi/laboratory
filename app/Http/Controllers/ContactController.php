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
            '<div>
                <a type="button" class="btn btn-default" data-toggle="modal" id="editContactsModalBtn" data-target="#editContactsModal" onclick="editCont('.$i.');"> <i class="fa fa-edit"></i></a>
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeContactsModal" id="removeContactsModalBtn" onclick="removeCont('.$contact->id.');"> <i class="fa fa-trash"></i></a>          
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
