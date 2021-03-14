<?php

namespace App\Traits;

use App\Models\Activity;
use App\Models\Journal;
use App\Models\Lesson;
use App\Models\Measure;
use App\Models\Program;

trait IsProgramActivity
{
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

    public function programs()
    {
        return $this->morphedByMany(
            Program::class,
            'doable',
            'activities',
            'id',
            'doable_id',
            'activity_id',
            'id'
        );
    }
}
