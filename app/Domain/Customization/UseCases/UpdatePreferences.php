<?php

namespace App\Domain\Customization\UseCases;

use App\Domain\Customization\Models\UIPreference;
use App\Domain\Customization\Services\CustomizationService;

class UpdatePreferences
{
    private CustomizationService $customizationService;

    public function __construct(CustomizationService $customizationService)
    {
        $this->customizationService = $customizationService;
    }

    /**
     * Update the preferences for a user.
     *
     * @param int $userId
     * @param array $data
     * @return UIPreference
     */
    public function execute(int $userId, array $data): UIPreference
    {
        return $this->customizationService->updatePreferences($userId, $data);
    }
}
