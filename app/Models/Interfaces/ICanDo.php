<?php

namespace App\Models\Interfaces;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface ICanDo
{
    // Require the implementing class to have an Activity morph
    public function activity(): MorphOne;

    public function programs(): BelongsToMany;
}
