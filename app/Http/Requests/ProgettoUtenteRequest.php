<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgettoUtenteRequest extends FormRequest
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
            'progetto_id'=>'required',
            'utente_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'progetto_id.required'=>'Progetto ID obbligatorio',
            'utente_id.required'=>'ID Utente obbligatorio',
        ];
    }

    
}
