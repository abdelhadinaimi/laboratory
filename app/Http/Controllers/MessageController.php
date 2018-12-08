<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use App\Message;
use Auth;

class MessageController extends Controller
{
    

    public function index()
    {
    	$labo = Parametre::find('1');
        $messages = Message::all();
        return view('messages.index')->with([
            'labo' => $labo,'messages' => $messages,
        ]);;
    }

    public function delete($id){
        if(Auth::user()->role->nom != 'admin'){
            return response()->json(array("error" => "bad credentials"));
        }
        $success = true;
        $message = "";
        $deleted = Message::destroy($id);
        if(!$deleted){
            $success = false;
            $message = "Ce message n'existe plu";
        }
        return response()->json(array("success" => $success, "message" => $message));
    }
}
