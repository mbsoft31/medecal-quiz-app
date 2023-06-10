<?php

namespace App\Domain\Quiz\UseCases;

use App\Domain\Quiz\Models\Quiz;
use App\Domain\Quiz\Repositories\QuizRepositoryInterface;
use App\Domain\Quiz\Events\QuizSubmitted;

class SubmitQuiz
{
    private QuizRepositoryInterface $quizRepository;

    /**
     * SubmitQuiz constructor.
     *
     * @param QuizRepositoryInterface $quizRepository
     */
    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * Submit a quiz.
     *
     * @param Quiz $quiz
     */
    public function execute(Quiz $quiz)
    {
        // Perform any necessary logic before submitting the quiz

        // Update the quiz status or perform any other operations

        // Save the quiz to the repository
        $this->quizRepository->save($quiz);

        // Dispatch the QuizSubmitted event
        event(new QuizSubmitted($quiz));
    }
}
