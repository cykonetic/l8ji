<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'exercise_id';

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, $this->primaryKey, 'activity_id', 'activity');
    }
}
