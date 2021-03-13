<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

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
            null,
            'activity_id'
        );
    }

    public function journals()
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

    public function lessons()
    {
        return $this->morphedByMany(
            Lesson::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function measures()
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
}
