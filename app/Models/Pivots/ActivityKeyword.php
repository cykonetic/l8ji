<?php

namespace App\Models\Pivots;

use App\Models\Exercise;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pivots\ActivityKeyword
 *
 * @property int $activity_id
 * @property int $keyword_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Pivots\Activity $activity
 * @property-read Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read Keyword $keyword
 * @property-read Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Collection|Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|ActivityKeyword newModelQuery()
 * @method static Builder|ActivityKeyword newQuery()
 * @method static Builder|ActivityKeyword query()
 * @method static Builder|ActivityKeyword whereActivityId($value)
 * @method static Builder|ActivityKeyword whereCreatedAt($value)
 * @method static Builder|ActivityKeyword whereKeywordId($value)
 * @method static Builder|ActivityKeyword whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ActivityKeyword extends MorphPivot
{
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function keyword(): BelongsTo
    {
        return $this->belongsTo(Keyword::class);
    }

    public function exercises(): ?MorphToMany
    {
        return $this->morphedByMany(
            Exercise::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function journals(): ?MorphToMany
    {
        return $this->morphedByMany(
            Journal::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function lessons(): ?MorphToMany
    {
        return $this->morphToMany(
            Lesson::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function measures(): ?MorphToMany
    {
        return $this->morphedByMany(
            Measure::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function programs(): ?MorphToMany
    {
        return $this->morphedByMany(
            Program::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }
}
