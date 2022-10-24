<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateconvocatoriaRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'num_convocatoria' => 'required|max:255',
            'ejercicio' => 'required|max:255',
            'status' => 'required|max:255',
        ];
    }
    public function attributes(): array
    {
        return [
            'nombre' => 'Descripción',
            'num_convocatoria' => 'Número de Convocatoria',
            'ejercicio' => 'Ejercicio',
            'status' => 'Estatus',
        ];
    }
}
