<?php

namespace App\Models\Traits;

use App\Models\Keyword;
use App\Models\Pivots\ActivityKeyword;

trait Keywords
{
    public function keywords()
    {
        return $this->hasManyThrough(
            Keyword::class,
            ActivityKeyword::class,
            'activity_id',
            'keyword_id',
            'id',
            'keyword_id'
        );
    }
}
