<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyectosRequest extends FormRequest
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
            'titulo' => 'required',
            'numalumn' => 'required',
            'tematica'=> "required",
            'subtematica'=> "required",
            'objectgeneral'=> "required",
            'modalidad'=> "required",
            'requisitos'=> "required",
        ];
    }
    public function attributes(): array
    {
        return [
            'titulo' => 'Titulo del proyecto',
            'numalumn' => 'Numero de alumnos',
            'tematica'=> "Tematica",
            'subtematica'=> "Subtematica",
            'objectgeneral'=> "Objetivo General",
            'modalidad'=> "Modalidad",
            'requisitos'=> "Requisitos del proyecto",
        ];
    }
}
