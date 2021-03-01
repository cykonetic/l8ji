<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseDetail extends Model
{
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
