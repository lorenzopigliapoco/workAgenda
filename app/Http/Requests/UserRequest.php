<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome' => 'required',
            'cognome' =>'required',
            'email' =>'required | email',
            'ruolo' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'Nome obbligatorio',
            'cognome.required' =>'Cognome obbligatorio',
            'email.required' =>'Email obbligatoria',
            'ruolo.required' =>'required',
        ];
    }
}
