<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:255',
            'email' => 'required|max:255',  
            'telephone' => 'required|max:10', 
            'sujet' => 'required|max:255',
            'msg' => 'required|max:2000',   
             ];
    }
}
