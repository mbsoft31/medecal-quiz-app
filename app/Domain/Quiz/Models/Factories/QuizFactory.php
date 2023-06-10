<?php

namespace App\Domain\Quiz\Models\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Domain\Quiz\Models\Quiz;

/**
 * @extends Factory<Quiz>
 */
class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'total_marks' => $this->faker->numberBetween(0, 100),
            'time_limit' => $this->faker->numberBetween(0, 60),
        ];
    }
}
