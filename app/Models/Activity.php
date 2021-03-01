<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

abstract class Activity extends Model
{
    use HasFactory;

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'activity_keyword', 'activity_id');
    }

    abstract public function detail();
}
