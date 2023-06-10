<?php

namespace App\Domain\Customization\Repositories;

use App\Domain\Customization\Models\UIPreference;

class EloquentUIPreferenceRepository implements UIPreferenceRepositoryInterface
{
    public function findById(int $id): ?UIPreference
    {
        return UIPreference::find($id);
    }

    public function findByUserId(int $userId): ?UIPreference
    {
        return UIPreference::where('user_id', $userId)->first();
    }

    public function save(UIPreference $uiPreference): UIPreference
    {
        $uiPreference->save();
        return $uiPreference;
    }
}
