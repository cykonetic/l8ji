<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'name',
        'description',
    ];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'activity_keyword', 'activity_id');
    }

    public function activity()
    {
        return $this->morphTo();
    }

    public function detail()
    {
        return $this->activity()->detail();
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)
            ->using(ProgramActivity::class);
    }
}
