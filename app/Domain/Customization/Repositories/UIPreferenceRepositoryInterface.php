<?php

namespace App\Domain\Customization\Repositories;

use App\Domain\Customization\Models\UIPreference;

interface UIPreferenceRepositoryInterface
{
    public function findById(int $id): ?UIPreference;

    public function findByUserId(int $userId): ?UIPreference;

    public function save(UIPreference $uiPreference): UIPreference;
}
