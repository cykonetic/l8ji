<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

abstract class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'name',
        'description'
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
}
