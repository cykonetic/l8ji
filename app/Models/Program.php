<?php

namespace App\Models;

use App\Models\Interfaces\IKeywordable;
use App\Models\Interfaces\IProgramable;
use App\Models\Pivots\Activity;
use App\Models\Pivots\ActivityProgram;
use App\Models\Traits\Keywordable;
use App\Models\Traits\Programable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Program
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Activity|null $activity
 * @property-read Collection|\App\Models\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @property-read Collection|\App\Models\Sequence[] $sequences
 * @property-read int|null $sequences_count
 * @method static Builder|Program newModelQuery()
 * @method static Builder|Program newQuery()
 * @method static Builder|Program query()
 * @method static Builder|Program whereCreatedAt($value)
 * @method static Builder|Program whereDeletedAt($value)
 * @method static Builder|Program whereDescription($value)
 * @method static Builder|Program whereId($value)
 * @method static Builder|Program whereName($value)
 * @method static Builder|Program whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Program extends Model implements IProgramable, IKeywordable
{
    use Programable;
    use Keywordable;

    protected $guarded = [];

    public function sequences(): HasMany
    {
        return $this->hasMany(Sequence::class);
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class)
            ->using(ActivityProgram::class)
            ->withTimestamps();
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
}
