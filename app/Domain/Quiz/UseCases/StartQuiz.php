<?php

namespace App\Domain\Quiz\UseCases;

use App\Domain\Quiz\Models\Quiz;
use App\Domain\Quiz\Repositories\QuizRepositoryInterface;
use App\Domain\Quiz\Events\QuizStarted;

class StartQuiz
{
    private QuizRepositoryInterface $quizRepository;

    /**
     * StartQuiz constructor.
     *
     * @param QuizRepositoryInterface $quizRepository
     */
    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * Start a quiz.
     *
     * @param Quiz $quiz
     */
    public function execute(Quiz $quiz): void
    {
        // Perform any necessary logic before starting the quiz

        // Dispatch the QuizStarted event
        event(new QuizStarted($quiz));
    }
}
