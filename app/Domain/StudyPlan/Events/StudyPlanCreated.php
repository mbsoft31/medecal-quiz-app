<?php

namespace App\Domain\StudyPlan\Events;

use App\Domain\StudyPlan\Models\StudyPlan;
use Illuminate\Foundation\Events\Dispatchable;

class StudyPlanCreated
{
    use Dispatchable;

    public StudyPlan $studyPlan;

    public function __construct(StudyPlan $studyPlan)
    {
        $this->studyPlan = $studyPlan;
    }
}
