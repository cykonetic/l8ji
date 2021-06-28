<?php

namespace App\Models\Traits;

use App\Models\Pivots\ProgramActivity;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Programable
{
    public function programActivities(): MorphToMany
    {
        return $this->morphedByMany(
            ProgramActivity::class,
            'doable',
            'activities'
        );
    }
}
