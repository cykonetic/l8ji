<?php

namespace App\Models\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

trait CanDo
{
    use HasFactory;
    use SoftDeletes;

    public static function bootCanDo()
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
}
