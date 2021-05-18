<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
        'data'=> 'required|date',
        'ore_spese'=>'required',
        'note'=>'max:64',
        'progetto' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
        'data.required'=> 'Data obbligatoria',
        'ore_spese.required'=> ' Ore spese obbligatorie',
        'progetto.required' => 'Progetto obbligatorio',
        ];
    }
}
