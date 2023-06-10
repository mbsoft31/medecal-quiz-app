<?php

namespace App\Domain\Quiz\Events;

use App\Domain\Quiz\Models\Quiz;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuizSubmitted
{
    use Dispatchable, SerializesModels;

    /**
     * The submitted quiz.
     *
     * @var Quiz
     */
    public Quiz $quiz;

    /**
     * Create a new event instance.
     *
     * @param Quiz $quiz
     */
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }
}
