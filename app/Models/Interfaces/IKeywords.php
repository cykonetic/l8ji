<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface IKeywords
{
    public function keywords(): BelongsToMany;
}
