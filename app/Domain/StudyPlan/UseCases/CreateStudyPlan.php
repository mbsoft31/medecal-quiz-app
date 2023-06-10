<?php

namespace App\Domain\StudyPlan\UseCases;

use App\Domain\StudyPlan\Models\StudyPlan;
use App\Domain\StudyPlan\Services\StudyPlanService;

class CreateStudyPlan
{
    private StudyPlanService $studyPlanService;

    public function __construct(StudyPlanService $studyPlanService)
    {
        $this->studyPlanService = $studyPlanService;
    }

    /**
     * Create a new study plan.
     *
     * @param array $data
     * @return StudyPlan
     */
    public function execute(array $data): StudyPlan
    {
        return $this->studyPlanService->createStudyPlan($data);
    }
}
