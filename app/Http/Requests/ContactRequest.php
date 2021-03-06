<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'prenom' => 'required|max:255',
            'fonction' => 'max:255',
            'nature' => 'required|max:255',
            'email' => 'max:255',  
            'num_tel' => 'max:15',   
            'description' => 'max:255',
            'partenaire_id' => 'required|max:10'
             ];
    }
}
