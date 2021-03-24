<?php

namespace App\Models;

use App\Models\Interfaces\ICanDo;
use App\Models\Interfaces\IKeywords;
use App\Models\Pivots\ProgramActivity;
use App\Models\Traits\CanDo;
use App\Models\Traits\Keywords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Program
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Program[] $programs
 * @property-read int|null $programs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sequence[] $sequences
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
 * @mixin \Eloquent
 */
class Program extends Model implements ICanDo, IKeywords
{
    use CanDo;
    use Keywords;

    protected $guarded = [];

    public function sequences(): HasMany
    {
        return $this->hasMany(Sequence::class);
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'program_activity')
            ->using(ProgramActivity::class)
            ->withTimestamps();
    }

    public function exercises(): HasManyThrough
    {
        return $this->hasManyThrough(
            Exercise::class,
            ProgramActivity::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }

    public function journals(): HasManyThrough
    {
        return $this->hasManyThrough(
            Journal::class,
            ProgramActivity::class,
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
            ProgramActivity::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }

    public function measures(): HasManyThrough
    {
        return $this->hasManyThrough(
            Measure::class,
            ProgramActivity::class,
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
            ProgramActivity::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }

}
