<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PersonIndexRequest extends FormRequest
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
            'type_person' => 'in:0,1',
            'first_name' => 'string',
            'last_name' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'in'  => 'El campo :attribute solamente puede valer: :values',
            'string'    => 'El campo :attribute debe ser un string',
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