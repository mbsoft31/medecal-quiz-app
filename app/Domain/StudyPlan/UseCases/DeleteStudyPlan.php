<?php

namespace App\Domain\StudyPlan\UseCases;

use App\Domain\StudyPlan\Models\StudyPlan;
use App\Domain\StudyPlan\Services\StudyPlanService;

class DeleteStudyPlan
{
    private StudyPlanService $studyPlanService;

    public function __construct(StudyPlanService $studyPlanService)
    {
        $this->studyPlanService = $studyPlanService;
    }

    /**
     * Delete a study plan.
     *
     * @param StudyPlan $studyPlan
     * @return void
     */
    public function execute(StudyPlan $studyPlan): void
    {
        $this->studyPlanService->deleteStudyPlan($studyPlan);
    }
}
