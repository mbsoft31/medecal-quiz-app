<?php

namespace App\Domain\Customization\Events;

use App\Domain\Customization\Models\UIPreference;
use Illuminate\Foundation\Events\Dispatchable;

class PreferencesUpdated
{
    use Dispatchable;

    public UIPreference $uiPreference;

    public function __construct(UIPreference $uiPreference)
    {
        $this->uiPreference = $uiPreference;
    }
}
