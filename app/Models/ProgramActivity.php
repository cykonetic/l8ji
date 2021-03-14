<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ProgramActivity
 *
 * @property-read \App\Models\Activity $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read \App\Models\Program $program
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity query()
 * @mixin \Eloquent
 */
class ProgramActivity extends Pivot
{
    protected $table = 'program_activities';

    public $incrementing = true;

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function exercises()
    {
        return $this->morphedByMany(
            Measure::class,
            'doable',
            'activities',
            'id',
            'doable_id',
            'activity_id',
            'id'
        );
    }

    public function journals()
    {
        return $this->morphedByMany(
            Journal::class,
            'doable',
            'activities',
            'id',
            'doable_id',
            'activity_id',
            'id'
        );
    }

    public function lessons()
    {
        return $this->morphedByMany(
            Lesson::class,
            'doable',
            'activities',
            'id',
            'doable_id',
            'activity_id',
            'id'
        );
    }

    public function measures()
    {
        return $this->morphedByMany(
            Measure::class,
            'doable',
            'activities',
            'id',
            'doable_id',
            'activity_id',
            'id'
        );
    }
}
