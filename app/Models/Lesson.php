<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Lesson extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('activity_type', static::class);
        });

        static::creating(function (Lesson $lesson) {
            $lesson->forceFill([
                'activity_type' => self::class,
            ]);
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'activity');
    }

    public function detail()
    {
        return $this->hasOne(LessomDetail::class, 'lesson_id');
    }
}
