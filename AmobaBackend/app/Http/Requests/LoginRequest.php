<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'exists'    => 'El email no se encuentra registrado',
            'string'    => 'El campo :attribute debe ser un string',
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
