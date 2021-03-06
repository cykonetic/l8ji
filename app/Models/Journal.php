<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Journal extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('activity_type', static::class);
        });

        static::creating(function (Journal $journal) {
            $journal->forceFill([
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
        return $this->hasOne(JournalDetail::class, 'journal_id');
    }
}
