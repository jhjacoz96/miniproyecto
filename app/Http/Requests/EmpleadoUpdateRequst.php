<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateRequst extends FormRequest
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
            'nombre'=>'min:2|required',
            'apellido'=>'min:2|required',
            'cedula'=>'min:7|required|unique:empleados,cedula,' 
            . $this->empleado,
            'departamento_id'=>'required',
        ];
    }
}
