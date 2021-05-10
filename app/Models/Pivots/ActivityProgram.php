<?php

namespace App\Models\Pivots;

use App\Models\Exercise;
use App\Models\Journal;
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
 * App\Models\Pivots\ActivityProgram
 *
 * @property int $id
 * @property int $program_id
 * @property int $activity_id
 * @property int|null $sequence
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Pivots\Activity $activity
 * @property-read Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Collection|Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read Program $program
 * @property-read Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|ActivityProgram newModelQuery()
 * @method static Builder|ActivityProgram newQuery()
 * @method static Builder|ActivityProgram query()
 * @method static Builder|ActivityProgram whereActivityId($value)
 * @method static Builder|ActivityProgram whereCreatedAt($value)
 * @method static Builder|ActivityProgram whereDeletedAt($value)
 * @method static Builder|ActivityProgram whereId($value)
 * @method static Builder|ActivityProgram whereProgramId($value)
 * @method static Builder|ActivityProgram whereSequence($value)
 * @method static Builder|ActivityProgram whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ActivityProgram extends MorphPivot
{
    protected $table = 'activity_program';

    public $timestamps = true;
    public $incrementing = true;

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
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
