<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type', static::class);
        });

        static::creating(function (Exercise $exercise) {
            $exercise->forceFill([
                'type' => self::class
            ]);
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'activity');
    }

    public function detail()
    {
        return $this->hasOne(ExerciseDetail::class);
    }
}
