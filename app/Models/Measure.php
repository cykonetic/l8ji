<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Measure extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type', self::class);
        });

        static::creating(function (Measure $measure) {
            $measure->forceFill([
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
        return $this->hasOne(MeasureeDetail::class);
    }
}
