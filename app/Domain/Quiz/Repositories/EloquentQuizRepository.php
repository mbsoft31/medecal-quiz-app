<?php

namespace App\Domain\Quiz\Repositories;

use App\Domain\Quiz\Models\Quiz;

class EloquentQuizRepository implements QuizRepositoryInterface
{
    public function findById(int $id): ?Quiz
    {
        return Quiz::find($id);
    }

    public function save(Quiz $quiz): Quiz
    {
        $quiz->save();
        return $quiz;
    }

    public function delete(Quiz $quiz): bool
    {
        return $quiz->delete();
    }
    // Implement other methods as needed
}
