<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatecalendario_convocatoriaRequest extends FormRequest
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
        return [
            'id_convocatoria' => 'required',
            'id_evento' => 'required',
            'fec_inicio' => 'required|date',
            'fec_fin' => 'required|date',
            'comentario' => 'required|max:255',
        ];
    }
    public function attributes(): array
    {
        return [
            'id_convocatoria' => 'Convocatoria',
            'id_evento' => 'Evento',
            'fec_inicio' => 'Fecha Inicio',
            'fec_fin' => 'Fecha Fin',
            'comentario' => 'Comentario',
        ];
    }
}
