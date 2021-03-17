<?php

namespace App\Models;

use App\Models\Pivots\ActivityKeyword;
use App\Models\Pivots\ProgramActivity;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property int $doable_id
 * @property string $doable_type
 * @property-read Model|\Eloquent $doable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDoableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDoableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function doable()
    {
        return $this->morphTo();
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class)
            ->using(ActivityKeyword::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)
            ->using(ProgramActivity::class);
    }
}
