<?php

namespace App\Domain\User\Validators;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public static function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            // Add more validation rules as per your requirements
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $validator->validated();
    }
}
