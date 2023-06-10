<?php

namespace App\Domain\StudyPlan\Repositories;

use App\Domain\StudyPlan\Models\StudyPlan;

class EloquentStudyPlanRepository implements StudyPlanRepositoryInterface
{
    public function findById(int $id): ?StudyPlan
    {
        return StudyPlan::find($id);
    }

    public function save(StudyPlan $studyPlan): StudyPlan
    {
        $studyPlan->save();
        return $studyPlan;
    }

    public function delete(StudyPlan $studyPlan): void
    {
        $studyPlan->delete();
    }
}
