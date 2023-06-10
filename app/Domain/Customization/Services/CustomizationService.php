<?php

namespace App\Domain\Customization\Services;

use App\Domain\Customization\Models\Theme;
use App\Domain\Customization\Models\UIPreference;
use App\Domain\Customization\Repositories\UIPreferenceRepositoryInterface;
use App\Domain\Customization\Events\ThemeChanged;
use App\Domain\Customization\Events\PreferencesUpdated;

class CustomizationService
{
    private $uiPreferenceRepository;

    public function __construct(UIPreferenceRepositoryInterface $uiPreferenceRepository)
    {
        $this->uiPreferenceRepository = $uiPreferenceRepository;
    }

    public function changeTheme(int $userId, string $themeName): Theme
    {
        $theme = Theme::where('name', $themeName)->firstOrFail();

        $uiPreference = $this->getOrCreateUIPreference($userId);
        $uiPreference->theme_id = $theme->id;
        $this->uiPreferenceRepository->save($uiPreference);

        event(new ThemeChanged($theme));

        return $theme;
    }

    public function updatePreferences(int $userId, array $data): UIPreference
    {
        $uiPreference = $this->getOrCreateUIPreference($userId);
        $uiPreference->update($data);
        $this->uiPreferenceRepository->save($uiPreference);

        event(new PreferencesUpdated($uiPreference));

        return $uiPreference;
    }

    private function getOrCreateUIPreference(int $userId): UIPreference
    {
        $uiPreference = $this->uiPreferenceRepository->findByUserId($userId);

        if (!$uiPreference) {
            $uiPreference = new UIPreference(['user_id' => $userId]);
        }

        return $uiPreference;
    }
}
