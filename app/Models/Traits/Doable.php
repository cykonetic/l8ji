<?php

namespace App\Models\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

trait Doable
{
    use HasFactory;
    use SoftDeletes;

    public static function bootDoable()
    {
        static::created(function (Model $doable) {
            Activity::updateOrCreate([
                'doable_type' => get_class($doable),
                'doable_id' => $doable->id,
            ]);
        });
    }

    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'doable');
    }
}
