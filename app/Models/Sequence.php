<?php

namespace App\Models;

use App\Models\Pivots\Activity;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as WithBuilder;

/**
 * App\Models\Sequence
 *
 * @property-read Activity|null $activity
 * @property-read Collection|\App\Models\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read \App\Models\Program|null $program
 * @property-read Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Sequence newModelQuery()
 * @method static Builder|Sequence newQuery()
 * @method static WithBuilder|Sequence onlyTrashed()
 * @method static Builder|Sequence query()
 * @method static WithBuilder|Sequence withTrashed()
 * @method static WithBuilder|Sequence withoutTrashed()
 * @mixin Eloquent
 */
class Sequence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'program_activity';

    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }

    public function program(): HasOne
    {
        return $this->hasOne(Program::class);
    }

    public function exercises(): ?MorphToMany
    {
        return $this->morphedByMany(
            Exercise::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function journals(): ?MorphToMany
    {
        return $this->morphedByMany(
            Journal::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function lessons(): ?MorphToMany
    {
        return $this->morphToMany(
            Lesson::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function measures(): ?MorphToMany
    {
        return $this->morphedByMany(
            Measure::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }

    public function programs(): ?MorphToMany
    {
        return $this->morphedByMany(
            Program::class,
            'doable',
            'activities',
            'id',
            null,
            'activity_id'
        );
    }
}
