<?php

namespace App\Domain\User\Models\Factories;

use App\Domain\User\Models\UserPreference;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPreferenceFactory extends Factory
{

    protected $model = UserPreference::class;

    /**
     * define the model's default state
     * @return array
     */
    public function definition(): array
    {
        return [
            'theme' => fake()->randomElement(['light', 'dark']),
            'font_size' => fake()->randomElement(['small', 'medium', 'large']),
            'language' => fake()->randomElement(['en', 'fr', 'es']),
            'timezone' => fake()->timezone,
        ];
    }
}
