<?php

namespace App\Models\Interfaces;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface ICanDo
{
    // Require the implementing class to have an Activity morph
    public function activity(): MorphOne;

    public function programs(): HasManyThrough;
}
