<?php

namespace App\Rules;

use App\Models\Person;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UpdateFilePerson implements Rule
{
    protected $person;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($person)
    {
        $this->person = Person::find($person);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $path = env('APP_URL') . $this->person->ima_profile;
        if ($path == $value) {
            return true;
        } else {
            $bool = Validator::make(
                [$attribute => $value],
                [$attribute => 'file|mimes:jpeg,bmp,png']
            );
            if ($bool->fails()) {
                return false;
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El avatar debe ser un archivo, extensiones permitidas: jpeg,bmp,png';
    }
}