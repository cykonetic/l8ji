<?php

namespace App\Models\Traits;

use App\Models\Pivots\ActivityKeyword;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Keywordable
{
    public function activityKeywords(): MorphToMany
    {
        return $this->morphedByMany(
            ActivityKeyword::class,
            'doable',
            'activities'
        );
    }
}
