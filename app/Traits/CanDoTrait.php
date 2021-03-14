<?php

namespace App\Traits;

use App\Interfaces\CanDoInterface;
use App\Models\Activity;
use Exception;

trait CanDoTrait
{
    public static function boot()
    {
        parent::boot();

        static::created(function (CanDoInterface $doable) {
            try {
                $activity = Activity::create([
                    'doable_type' => get_class($doable),
                    'doable_id' => $doable->id,
                ]);
                $activity->saveQuietly();
            } catch(Exception $e) {

            }
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'doable');
    }
}
