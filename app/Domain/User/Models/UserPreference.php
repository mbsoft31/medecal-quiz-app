<?php

namespace App\Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPreference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'theme', 'font_size', 'language', 'timezone',
    ];

    /**
     * Get the user associated with the preference.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
