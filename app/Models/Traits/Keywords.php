<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Keywords
{
    public function keywords(): BelongsToMany
    {
        return $this->activity->keywords();
    }
}
