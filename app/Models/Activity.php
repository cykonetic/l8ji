<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

abstract class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'activity_keyword', 'activity_id');
    }

    public function detail()
    {
        $actionClass = $this->type;
        return $actionClass::find($this->id)->detail();
    }
}
