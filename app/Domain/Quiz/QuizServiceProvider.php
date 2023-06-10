<?php

namespace App\Domain\Quiz;

use App\Domain\Quiz\Repositories\QuizRepositoryInterface;
use App\Domain\Quiz\Repositories\EloquentQuizRepository;

class QuizServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(QuizRepositoryInterface::class, EloquentQuizRepository::class);
    }

}
