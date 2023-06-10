<?php

namespace App\Domain\StudyPlan\Services;

use App\Domain\StudyPlan\Models\StudyPlan;
use App\Domain\StudyPlan\Repositories\StudyPlanRepositoryInterface;
use App\Domain\StudyPlan\Events\StudyPlanCreated;
use App\Domain\StudyPlan\Events\StudyPlanUpdated;
use App\Domain\StudyPlan\Events\StudyPlanDeleted;

class StudyPlanService
{
    private $studyPlanRepository;

    public function __construct(StudyPlanRepositoryInterface $studyPlanRepository)
    {
        $this->studyPlanRepository = $studyPlanRepository;
    }

    public function createStudyPlan(array $data): StudyPlan
    {
        $studyPlan = new StudyPlan($data);
        $this->studyPlanRepository->save($studyPlan);

        event(new StudyPlanCreated($studyPlan));

        return $studyPlan;
    }

    public function updateStudyPlan(StudyPlan $studyPlan, array $data): StudyPlan
    {
        $studyPlan->fill($data);
        $this->studyPlanRepository->save($studyPlan);

        event(new StudyPlanUpdated($studyPlan));

        return $studyPlan;
    }

    public function deleteStudyPlan(StudyPlan $studyPlan): void
    {
        $this->studyPlanRepository->delete($studyPlan);

        event(new StudyPlanDeleted($studyPlan));
    }
}
