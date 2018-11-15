<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class theseRequest extends FormRequest
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
            'titre' => 'required|min:3',
            'sujet' => 'required|min:10',
            'user_id' => 'required',
            'date_debut' => 'required',


        ];
    }
}
