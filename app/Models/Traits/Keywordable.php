<?php

namespace App\Models\Traits;

use App\Models\Keyword;
use App\Models\Pivots\Activity;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Keywordable
{
    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class)
        ->using(Activity::class);
    }
}
