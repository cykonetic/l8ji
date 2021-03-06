<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'lesson_id';

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, $this->primaryKey, 'activity_id', 'activity');
    }
}
