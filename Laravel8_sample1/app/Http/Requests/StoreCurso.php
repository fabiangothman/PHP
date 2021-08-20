<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* False si no esta autorizado, luego hace la validacion de rules()
            p.e. para validacion de permisos en usuarios
        */
        //return false;
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
            'name' => 'required|max:10',
            'description' => 'required|min:10',
            'categoria' => 'required'
        ];
    }

    /**
     * Changes the default variables names to response
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre de curso',
        ];
    }

    /**
     * Changes the default phrase messages to response
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.required' => 'La descripción del curso es obligatoria.',
        ];
    }
}
