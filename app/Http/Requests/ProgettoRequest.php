<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgettoRequest extends FormRequest
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
        'nome_progetto'=>'required|max:50',
        'descrizione'=>'max:128',
        'note'=>'max:64',
        'costoOra'=>'required',
        'dataInizio'=>'required|date',
        'dataFine'=>'required|date',
        'ssid_cliente'=>'required',
        ];
    }
   
    public function messages()
    {
        return [
            'nome_progetto.required'=>'Nome progetto obbligatorio',
            'costoOra.required'=>'Costo orario obbligatorio',
            'dataInizio.required'=>'Data di inizio obbligatoria',
            'dataFine.required'=>'Data di fine obbligatoria',
            'ssid_cliente.required'=>'SSID cliente obbligatorio', 
        ];
    }
}
