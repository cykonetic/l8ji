<?php

namespace App\Models\Pivots;

use App\Models\Keyword;
use App\Models\Program;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as WithBuilder;

/**
 * App\Models\Pivots\Activity
 *
 * @property-read Model|\Eloquent $doable
 * @property-read Collection|Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Activity newModelQuery()
 * @method static Builder|Activity newQuery()
 * @method static WithBuilder|Activity onlyTrashed()
 * @method static Builder|Activity query()
 * @method static WithBuilder|Activity withTrashed()
 * @method static WithBuilder|Activity withoutTrashed()
 * @mixin Eloquent
 */
class Activity extends MorphPivot
{
    use SoftDeletes;

    protected $guarded = [];

    public function doable(): MorphTo
    {
        return $this->morphTo();
    }

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class)
            ->using(ActivityKeyword::class)
            ->withTimestamps();
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class)
            ->using(ActivityProgram::class)
            ->withTimestamps();
    }
}
