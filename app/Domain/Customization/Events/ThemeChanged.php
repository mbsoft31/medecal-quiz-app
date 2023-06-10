<?php

namespace App\Domain\Customization\Events;

use App\Domain\Customization\Models\Theme;
use Illuminate\Foundation\Events\Dispatchable;

class ThemeChanged
{
    use Dispatchable;

    public Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
