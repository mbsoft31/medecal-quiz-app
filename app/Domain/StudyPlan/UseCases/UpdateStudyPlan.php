<?php

namespace App\Domain\StudyPlan\UseCases;

use App\Domain\StudyPlan\Models\StudyPlan;
use App\Domain\StudyPlan\Services\StudyPlanService;

class UpdateStudyPlan
{
    private StudyPlanService $studyPlanService;

    public function __construct(StudyPlanService $studyPlanService)
    {
        $this->studyPlanService = $studyPlanService;
    }

    /**
     * Update an existing study plan.
     *
     * @param StudyPlan $studyPlan
     * @param array $data
     * @return StudyPlan
     */
    public function execute(StudyPlan $studyPlan, array $data): StudyPlan
    {
        return $this->studyPlanService->updateStudyPlan($studyPlan, $data);
    }
}
