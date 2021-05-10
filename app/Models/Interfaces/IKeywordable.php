<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface IKeywordable
{
    public function keywords(): BelongsToMany;
}
