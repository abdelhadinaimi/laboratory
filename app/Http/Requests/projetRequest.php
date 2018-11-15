<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projetRequest extends FormRequest
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
            'intitule' => 'required|min:3',
            'resume' => 'required|min:10',
            'type' => 'required', 
            'chef_id' => 'required'

        ];
    }
}
