<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActivityKeyword extends Pivot
{
    use HasFactory;

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function exercises()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Exercise::class]);
            },
        ]);
    }

    public function journals()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Journal::class]);
            },
        ]);
    }

    public function lessons()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Lesson::class]);
            },
        ]);
    }

    public function measures()
    {
        return $this->with([
            'activity' => function ($query) {
                return $query->morphWith([Measure::class]);
            },
        ]);
    }
}
