<?php

namespace App\Models\Traits;

use App\Models\Activity;
use App\Models\Pivots\ProgramActivity;
use App\Models\Program;
use App\Models\Scopes\ActivityScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

trait CanDo
{
    use HasFactory;
    use SoftDeletes;

    public static function bootCanDo()
    {
        static::addGlobalScope(new ActivityScope());

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

    public function programs(): HasManyThrough
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
