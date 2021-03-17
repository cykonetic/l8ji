<?php

namespace App\Models\Pivots;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
/**
 * App\Models\Pivots\ActivityKeyword
 *
 * @property int $activity_id
 * @property int $keyword_id
 * @property-read Activity $activity
 * @property-read Keyword $keyword
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereKeywordId($value)
 * @mixin \Eloquent
 */
class ActivityKeyword extends MorphPivot
{
    public function activity()
    {
        return $this->belongsTo(
            Activity::class,
            'id'
        );
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    public function exercises()
    {
        return $this->hasManyThrough(
            Exercise::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Exercise::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(
            Lesson::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Lesson::class);
    }

    public function programs()
    {
        return $this->hasManyThrough(
            Program::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Program::class);
    }
}
