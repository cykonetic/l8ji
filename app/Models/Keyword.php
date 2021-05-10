<?php

namespace App\Models;

use App\Models\Pivots\Activity;
use App\Models\Pivots\ActivityKeyword;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as WithBuilder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Keyword
 *
 * @property int $id
 * @property string $keyword
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Collection|\App\Models\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Keyword newModelQuery()
 * @method static Builder|Keyword newQuery()
 * @method static WithBuilder|Keyword onlyTrashed()
 * @method static Builder|Keyword query()
 * @method static Builder|Keyword whereCreatedAt($value)
 * @method static Builder|Keyword whereDeletedAt($value)
 * @method static Builder|Keyword whereId($value)
 * @method static Builder|Keyword whereKeyword($value)
 * @method static Builder|Keyword whereUpdatedAt($value)
 * @method static WithBuilder|Keyword withTrashed()
 * @method static WithBuilder|Keyword withoutTrashed()
 * @mixin Eloquent
 */
class Keyword extends Model
{
    use SoftDeletes;

    protected $guarded = [];


public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class)
            ->using(ActivityKeyword::class)
            ->withTimestamps();
    }

    public function exercises(): HasManyThrough
    {
        return $this->hasManyThrough(
            Exercise::class,
            ActivityKeyword::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }

    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(
            Lesson::class,
            ActivityKeyword::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }
    public function programs(): HasManyThrough
    {
        return $this->hasManyThrough(
            Program::class,
            ActivityKeyword::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }
}
