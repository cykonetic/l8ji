<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;

interface IKeywords
{
    public function keywords(): HasManyThrough;
}
