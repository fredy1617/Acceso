<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MiembroRequest extends FormRequest
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
            'Matricula' => 'required|unique:miembros|max:12|min:12',
            'Nombre' => 'required',
            'Primer_Apellido' => 'required', 
            'Segundo_Apellido' => 'required',
            'CURP'=> 'required|unique:miembros|max:18|min:18',
            'Sexo' => 'required',
            'U_Admin' => 'required',
            'U_Admin_Cve' => 'required',
            'Porm_Gral' => 'required|numeric',
            'Semestre' => 'required',
            'Edad' => 'required',
            'Email_Institucional' => 'required|unique:miembros',
            'Estado_Civil' => 'required',
            'Telefono' => 'required|numeric|max:10|min:10',
            'Tel_Celular' => 'required|numeric|max:10|min:10',
            'Calle' => 'required',
            'Colonia' => 'required',
            'Municipio' => 'required',
            'Estado' => 'required',
            'Sit_Academica' => 'required',
            //
        ];
    }
    public function messages()
{
    return [
    ];
}
}
