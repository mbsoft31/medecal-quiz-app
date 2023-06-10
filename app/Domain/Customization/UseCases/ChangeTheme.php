<?php

namespace App\Domain\Customization\UseCases;

use App\Domain\Customization\Models\Theme;
use App\Domain\Customization\Services\CustomizationService;

class ChangeTheme
{
    private CustomizationService $customizationService;

    public function __construct(CustomizationService $customizationService)
    {
        $this->customizationService = $customizationService;
    }

    /**
     * Change the theme for a user.
     *
     * @param int $userId
     * @param string $themeName
     * @return Theme
     */
    public function execute(int $userId, string $themeName): Theme
    {
        return $this->customizationService->changeTheme($userId, $themeName);
    }
}
