<?php

namespace App\Traits;

use App\Interdaces\CanDoInterface;
use App\Models\Activity;

trait CanDoTrait
{
    public static function boot()
    {
        parent::boot();

        static::created(function (CanDoInterface $doable) {
            (new Activity([
                'doable_type' => self::class,
                'doable_id' => $doable->id,
            ]))->save();
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'doable');
    }

    public function keywords()
    {
        return $this->with('activity.keywords');
    }

    public function programs()
    {
        return $this->with('activity.programs');
    }

}
