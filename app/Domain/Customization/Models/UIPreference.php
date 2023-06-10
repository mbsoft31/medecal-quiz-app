<?php

namespace App\Domain\Customization\Models;

use Illuminate\Database\Eloquent\Model;

class UIPreference extends Model
{
    protected $table = 'ui_preferences';
    protected $guarded = ['id'];
}

