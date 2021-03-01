<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
