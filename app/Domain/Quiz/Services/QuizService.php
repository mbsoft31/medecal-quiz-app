<?php

namespace App\Domain\Quiz\Services;

use App\Domain\Quiz\Models\Quiz;
use App\Domain\Quiz\Repositories\QuizRepositoryInterface;

class QuizService
{
    private QuizRepositoryInterface $quizRepository;

    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function createQuiz(array $data): Quiz
    {
        // Validate and process the quiz data
        $quiz = new Quiz();
        $quiz->fill($data);

        // Save the quiz using the repository
        return $this->quizRepository->save($quiz);
    }

    public function startQuiz(int $quizId): ?Quiz
    {
        // Fetch the quiz from the repository
        return $this->quizRepository->findById($quizId);
    }

    public function submitQuiz(int $quizId, array $answers): bool
    {
        // Fetch the quiz from the repository
        $quiz = $this->quizRepository->findById($quizId);

        if (!$quiz) {
            return false;
        }

        // Process the submitted answers and update the quiz

        // ...

        // Save the updated quiz using the repository
        $this->quizRepository->save($quiz);

        return true;
    }

    public function gradeQuiz(int $quizId): bool
    {
        // Fetch the quiz from the repository
        $quiz = $this->quizRepository->findById($quizId);

        if (!$quiz) {
            return false;
        }

        // Grade the quiz and update the results

        // ...

        // Save the updated quiz using the repository
        $this->quizRepository->save($quiz);

        return true;
    }
}
