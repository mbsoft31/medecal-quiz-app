<?php

namespace App\Domain\Quiz\Repositories;

use App\Domain\Quiz\Models\Quiz;

interface QuizRepositoryInterface
{
    public function findById(int $id): ?Quiz;
    public function save(Quiz $quiz): Quiz;
    public function delete(Quiz $quiz): bool;
    // Add other methods as needed
}
