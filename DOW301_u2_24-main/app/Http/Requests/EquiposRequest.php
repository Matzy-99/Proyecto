<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquiposRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:3|max:20|unique:equipos,nombre',
            'entrenador' => 'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del equipo',
            'nombre.min' => 'Nombre de equipo debe tener como minimo 3 letras',
            'nombre.max' => 'Nombre de equipo debe tener como máximo 20 letras',
            'nombre.unique' => 'Ya existe un equipo llamado :input',
            'entrenador.required' => 'Indique el nombre del entrenador'
        ];

    }
}
