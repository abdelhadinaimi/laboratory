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
        $partenaires = Partenaire::all();
        return view('partenaire.index')->with([
            'labo' => $labo,'partenaires' => $partenaires,
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
                $partenaire->description,
                $partenaire->email,
                $partenaire->num_tel,
 		        $button_Action	
             ); 
            $i++;
        }
      return response()->json($output);
    }

    public function create(PartenaireRequest $request)
    {
        $partenaire = new Partenaire();

        $partenaire->nom = $request->input('nom');
        $partenaire->email = $request->input('email');
        $partenaire->telephone = $request->input('telephone');
        $partenaire->sujet = $request->input('sujet');
        $partenaire->msg = $request->input('msg');

        $partenaire->save();
        return redirect('front/contact');
    }
}
