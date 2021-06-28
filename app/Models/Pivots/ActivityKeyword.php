<?php

namespace App\Models\Pivots;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

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
class ActivityKeyword extends Pivot
{
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function keyword(): BelongsTo
    {
        return $this->belongsTo(Keyword::class);
    }

    public function exercises(): MorphToMany
    {
        return $this->morphToMany(
            Exercise::class,
            'doable',
            'activities'
        );
    }

    public function lessons(): MorphToMany
    {
        return $this->morphToMany(
            Lesson::class,
            'doable',
            'activities'
        );
    }

    public function programs(): MorphToMany
    {
        return $this->morphToMany(
            Program::class,
            'doable',
            'activities'
        );
    }
}
