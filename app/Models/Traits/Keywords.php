<?php

namespace App\Models\Traits;

use App\Models\Keyword;
use App\Models\Pivots\ActivityKeyword;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

trait Keywords
{
    public function keywords(): HasManyThrough
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

    public function attachKeyword(Keyword $keyword)
    {
        $activity = $this->activity;
        ActivityKeyword::updateOrCreate([
            'activity_id' =>  $this->activity->id,
            'keyword_id' => $keyword->id ,
        ]);
    }

    public function removeKeyword(Keyword $keyword)
    {
        $activity = $this->activity;
        ActivityKeyword::where([
            ['activity_id', $activity->id],
            ['keyword_id', $keyword->id],
        ])->delete();
    }
}
