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
            'tipouser' => 'required|max:255',
            'nombre' => 'max:255',
            'apellidop' => 'required|max:255',
            'apellidom' => 'required|max:255',
            'curp' => 'max:255',
            'correo' => 'required|max:255',
            'correocon' => 'required|max:255|same:correo',
            'telefono' => 'required|max:255',
            'institution_id' => '',
            'nombre_doc' => '',
            'thematic_id' => '',
            'subthematic_id' => '',
            'nivelsni' => '',
            'gradomax' => '',
            'lineainv' => '',
            'puesto' => '',
            
            'password' => 'required|max:255|min:8',
        ];

        if ( $this->hasFile('constancia') ){
                $rules['constancia'] = ['max:2000','mimes:pdf'];
            }

        
        return $rules;
    }

    public function attributes(): array
    {
        return [
            'tipouser' => 'Tipo de usuario',
            'nombre' => 'Nombre',
            'apellidop' => 'Apellido paterno',
            'apellidom' => 'Apellido materno',
            'curp' => 'CURP',
            'correo' => 'Correo',
            'correocon' => 'Correo de confirmación',
            'telefono' => 'Teléfono',
            'institucionproced' => 'Institución de procedencia',
            'formatosolicitud' => 'Formato de solicitud',
            'areaconoc' => 'Área de conocimiento',
            'subareaconoc' => 'Subárea de conocimiento',
            'nivelsni' => 'Nivel SNI',
            'gradomax' => 'Grado máximo de estudios',
            'lineainv' => 'Línea de investigación',
            'puesto' => 'Puesto',
            'constancia' => 'Constancia',
            'password' => 'Contraseña',
            'password_confirmation' => 'Contraseña de confirmación',
        ];
    }
}
