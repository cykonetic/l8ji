<?php

namespace App\Models\Traits;

use App\Models\Pivots\Activity;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

trait Programable
{
    use HasFactory;
    use SoftDeletes;

    public static function bootProgramable()
    {
        static::created(function (Model $doable) {
            $activity = Activity::updateOrCreate([
                'doable_type' => get_class($doable),
                'doable_id' => $doable->id,
            ]);
            $activity->save();
        });
    }

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'doable');
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class)
            ->using(Activity::class)
            ->withTimestamps();
    }
}
