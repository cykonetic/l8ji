<?php

namespace App\Models\Pivots;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

/**
 * App\Models\Pivots\ActivityKeyword
 *
 * @property int $activity_id
 * @property int $keyword_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Activity $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Keyword $keyword
 * @property-read \Illuminate\Database\Eloquent\Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereKeywordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityKeyword whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActivityKeyword extends MorphPivot
{
    public function activity(): BelongsTo
    {
        return $this->belongsTo(
            Activity::class,
            'id'
        );
    }

    public function keyword(): BelongsTo
    {
        return $this->belongsTo(Keyword::class);
    }

    public function exercises(): HasManyThrough
    {
        return $this->hasManyThrough(
            Exercise::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->where('doable_type', Exercise::class);
    }

    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(
            Lesson::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->where('doable_type', Lesson::class);
    }

    public function programs(): HasManyThrough
    {
        return $this->hasManyThrough(
            Program::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->where('doable_type', Program::class);
    }
}
