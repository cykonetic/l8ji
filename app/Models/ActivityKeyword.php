<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ActivityKeyword
 *
 * @property int $activity_id
 * @property int $keyword_id
 * @property-read \App\Models\Activity $activity
 * @property-read \App\Models\Keyword $keyword
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereKeywordId($value)
 * @mixin \Eloquent
 */
class ActivityKeyword extends Pivot
{
    use HasFactory;

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function exercises()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Exercise::class]);
            },
        ]);
    }

    public function journals()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Journal::class]);
            },
        ]);
    }

    public function lessons()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Lesson::class]);
            },
        ]);
    }

    public function measures()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Measure::class]);
            },
        ]);
    }
}
