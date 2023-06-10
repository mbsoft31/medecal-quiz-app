<?php

namespace App\Domain\Quiz\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class QuizValidator
{
    public static function validate(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            // Add more validation rules as per your requirements
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator, 'Validation failed', $validator->errors());
        }

        return $validator->validated();
    }
}
