<?php

namespace App\Domain\Quiz\UseCases;

use App\Domain\Quiz\Models\Quiz;
use App\Domain\Quiz\Repositories\QuizRepositoryInterface;

class CreateQuiz
{
    private QuizRepositoryInterface $quizRepository;

    /**
     * CreateQuiz constructor.
     *
     * @param QuizRepositoryInterface $quizRepository
     */
    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * Create a new quiz.
     *
     * @param array $data
     * @return Quiz
     */
    public function execute(array $data): Quiz
    {
        $quiz = new Quiz();
        $quiz->fill($data);

        $createdQuiz = $this->quizRepository->save($quiz);

        return $createdQuiz;
    }
}
