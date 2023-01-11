<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        $rules = [
            'rol' => 'required|max:255',
            'name' => 'max:255',
            'lastnamep' => 'required|max:255',
            'lastnamem' => 'required|max:255',
            'curp' => 'max:255',
            'email' => 'required|max:255',
            'emailcon' => 'required|max:255|same:email',
            'phone' => 'required|max:255',
            'institution_id' => '',
            'name_doc' => '',
            'thematic_id' => '',
            'subthematic_id' => '',
            'snilevel' => '',
            'maxgrade' => '',
            'invline' => '',
            'job' => '', 
            'password' => 'required|max:255|min:8',
        ];

        if ( $this->hasFile('constancy') ){
                $rules['constancy'] = ['max:2000','mimes:pdf'];
            }

        if ( $this->hasFile('requestform') ){
                $rules['requestform'] = ['max:2000','mimes:pdf'];
            }

        
        return $rules;
    }

    public function attributes(): array
    {
        return [
            'rol' => 'Tipo de usuario',
            'name' => 'Nombre',
            'lastnamep' => 'Apellido paterno',
            'lastnamem' => 'Apellido materno',
            'curp' => 'CURP',
            'email' => 'Correo',
            'emailcon' => 'Correo de confirmación',
            'phone' => 'Teléfono',
            'institution_id' => 'Institución de procedencia',
            'requestform' => 'Formato de solicitud',
            'thematic_id' => 'Área de conocimiento',
            'subthematic' => 'Subárea de conocimiento',
            'snilevel' => 'Nivel SNI',
            'maxgrade' => 'Grado máximo de estudios',
            'invline' => 'Línea de investigación',
            'job' => 'Puesto',
            'constancy' => 'Constancia',
            'password' => 'Contraseña',
            'password_confirmation' => 'Contraseña de confirmación',
        ];
    }
}
