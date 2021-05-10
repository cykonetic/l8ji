<?php

namespace App\Models\Pivots;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Journal;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * App\Models\Pivots\ProgramActivity
 *
 * @property int $id
 * @property int $program_id
 * @property int $activity_id
 * @property int|null $sequence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Activity $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read Program $program
 * @property-read \Illuminate\Database\Eloquent\Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProgramActivity extends MorphPivot
{
    protected $table = 'program_activity';

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
        return $this->morphToyMany(
            Exercise::class,
            'doable',
            'activities'
        );
    }

    public function journals(): ?MorphToMany
    {
        return $this->morphToMany(
            Journal::class,
            'doable',
            'activities'
        );
    }

    public function lessons(): ?MorphToMany
    {
        return $this->morphToMany(
            Lesson::class,
            'doable',
            'activities'
        );
    }

    public function measures(): ?MorphToMany
    {
        return $this->morphToMany(
            Measure::class,
            'doable',
            'activities',
            'doable_id',
            'activity_id',
            'program_id',
            'activity_id'
        );
    }

    public function programs(): ?MorphToMany
    {
        return $this->morphToMany(
            Program::class,
            'doable',
            'activities'
        );
    }
}
