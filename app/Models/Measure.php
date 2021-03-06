<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Measure extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('activity_type', self::class);
        });

        static::creating(function (Measure $measure) {
            $measure->forceFill([
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
        return $this->hasOne(MeasureeDetail::class, 'message_id');
    }
}
