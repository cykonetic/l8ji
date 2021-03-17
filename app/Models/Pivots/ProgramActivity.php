<?php

namespace App\Models\Pivots;

use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Journal;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Notifications\Action;

/**
 * App\Models\Pivots\ProgramActivity
 *
 * @property-read Activity $activity
 * @property-read Program $program
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity query()
 * @mixin \Eloquent
 */
class ProgramActivity extends MorphPivot
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
        return $this->hasManyThrough(
            Exercise::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Exercise::class);
    }

    public function journals()
    {
        return $this->hasManyThrough(
            Journal::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Journal::class);
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

    public function measures()
    {
        return $this->hasManyThrough(
            Measure::class,
            Activity::class,
            'id',
            'id',
            'activity_id',
            'doable_id'
        )->firstWhere('doable_type', Measure::class);
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
