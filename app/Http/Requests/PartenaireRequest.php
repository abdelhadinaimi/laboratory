<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireRequest extends FormRequest
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
            'type' => 'required|max:255',
            'description' => 'max:255',
            'email' => 'max:255',  
            'num_tel' => 'max:15',   
            'pays' => 'max:255',
            'ville' => 'max:255',
             ];
    }
}
