<?php

namespace App\Traits;

use App\Interfaces\CanDoInterface;
use App\Interfaces\ICanDo;
use App\Models\Activity;
use Exception;

trait CanDo
{
    public static function boot()
    {
        parent::boot();

        static::created(function (ICanDo $doable) {
            try {
                Activity::create([
                    'doable_type' => get_class($doable),
                    'doable_id' => $doable->id,
                ]);
            } catch(Exception $e) {

            }
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'doable');
    }
}
