<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SignUpRequest extends FormRequest
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
            //
            'email' => 'required|string|unique:users|email',
            'password' => 'required|confirmed|string',
            'name' => 'required|string|min:3'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'string'    => 'El campo :attribute debe ser un string',
            'unique'    => 'El correo ya se encuentra registrado',
            'confirmed' => 'No coinciden las contraseñas',
            'min'       => 'El nombre debe tener mínimo 3 caractéres',
            'email'     => 'El campo no es un email valido'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response([
            'success' => false,
            'message' => $validator->errors()->first(),
            'data'    => [],
            'total'   => 0,
        ], 422);
        throw new ValidationException($validator, $response);
    }
}
