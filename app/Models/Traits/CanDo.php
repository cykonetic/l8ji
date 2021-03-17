<?php

namespace App\Models\Traits;

use App\Models\Activity;
use App\Models\Interfaces\ICanDo;
use App\Models\Pivots\ProgramActivity;
use App\Models\Program;

trait CanDo
{
    public static function boot()
    {
        parent::boot();

        static::created(function (ICanDo $doable) {
            Activity::create([
                'doable_type' => get_class($doable),
                'doable_id' => $doable->id,
            ]);
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'doable');
    }

    public function programs()
    {
        return $this->hasManyThrough(
            Program::class,
            ProgramActivity::class,
            'activity_id',
            'program_id',
            'id',
            'program_id'
        );
    }
}
