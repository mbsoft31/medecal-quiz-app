<?php

namespace App\Domain\StudyPlan\Repositories;

use App\Domain\StudyPlan\Models\StudyPlan;

interface StudyPlanRepositoryInterface
{
    public function findById(int $id): ?StudyPlan;

    public function save(StudyPlan $studyPlan): StudyPlan;

    public function delete(StudyPlan $studyPlan): void;
}
