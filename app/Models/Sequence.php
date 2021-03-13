<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sequence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'program_activities';

    public function program()
    {
        $this->belongsTo(Program::class);
    }

    public function activty()
    {
        $this->belongsTo(Activity::class);
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
