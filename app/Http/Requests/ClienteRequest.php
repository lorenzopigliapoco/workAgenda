<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'ragSoc'=>'required ',
            'nomeRef'=>'required ',
            'cognomeRef'=>'required ',
            'emailRef'=>'required ',
            'ssid'=>'required | numeric',
            'PEC'=>'required | ',
            'PIVA'=> 'required |size:11 ',
        ];
    }

    public function messages(){

        return [
            'ragSoc.required'        =>'Ragione sociale obbligatoria',
            'nomeRef.required'       =>'Nome referente obbligatorio',
            'cognomeRef.required'    =>'Cognome referente obbligatorio',
            'emailRef.required'      =>'Email referente obbligatoria',
            'ssid.required'          =>'SSID obbligatorio',
            'PIVA.required'          =>'PEC obbligatoria',
            'PEC.required'           =>'P.IVA obbligatoria',
        ];
    }
}
