<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'activity_keyword', 'activity_id');
    }

    public function journals()
    {
        return $this->belongsToMany(Journal::class, 'activity_keyword', 'activity_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'activity_keyword', 'activity_id');
    }

    public function measures()
    {
        return $this->belongsToMany(Measure::class, 'activity_keyword', 'activity_id');
    }
}
