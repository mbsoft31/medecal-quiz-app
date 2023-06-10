<?php

namespace App\Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'description',
        'total_marks',
        'time_limit',
    ];
}