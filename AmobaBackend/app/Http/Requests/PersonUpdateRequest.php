<?php

namespace App\Http\Requests;

use App\Rules\UpdateFilePerson;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class PersonUpdateRequest extends FormRequest
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'avatar' => ['required', new UpdateFilePerson($this->person)],
            'document' => ['required', 'string', Rule::unique('persons', 'document')->ignore($this->person),],
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'unique'    => 'El documento ya se encuentra registrado',
            'string'    => 'El campo :attribute debe ser un string',
            'mimes'     => 'El archivo debe ser un formato valido ( :values )',
            'min'       => 'El :attribute debe ser mínimo :min caracteres'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'nombre',
            'last_name' => 'apellido',
            'avatar' => 'imagen de perfil',
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