<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Keyword
 *
 * @property int $id
 * @property string $keyword
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newQuery()
 * @method static \Illuminate\Database\Query\Builder|Keyword onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Keyword withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Keyword withoutTrashed()
 * @mixin \Eloquent
 */
class Keyword extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    
public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function exercises()
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

    public function lessons()
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

    public function lessons()
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

    /*
    public function journals()
    {
        return $this->hasManyThrough(
            Journal::class,
            ActivityKeyword::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }

    public function measures()
    {
        return $this->hasManyThrough(
            Measure::class,
            ActivityKeyword::class,
            'program_id',
            'activity_id',
            'id',
            'id'
        );
    }
    */
}
