<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exercise.
 *
 * @property int                                                            $activity_id
 * @property string                                                         $activity_type
 * @property string                                                         $name
 * @property string                                                         $description
 * @property \Illuminate\Support\Carbon|null                                $created_at
 * @property \Illuminate\Support\Carbon|null                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                $deleted_at
 * @property \App\Models\Activity|null                                      $activity
 * @property \App\Models\ExerciseDetail|null                                $detail
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property int|null                                                       $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property int|null                                                       $programs_count
 *
 * @method static Builder|Exercise newModelQuery()
 * @method static Builder|Exercise newQuery()
 * @method static Builder|Exercise query()
 * @method static Builder|Exercise whereActivityId($value)
 * @method static Builder|Exercise whereActivityType($value)
 * @method static Builder|Exercise whereCreatedAt($value)
 * @method static Builder|Exercise whereDeletedAt($value)
 * @method static Builder|Exercise whereDescription($value)
 * @method static Builder|Exercise whereName($value)
 * @method static Builder|Exercise whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function (Exercise $exercise) {
            new Activity([
                'doable_type' => self::class,
                'doable_id' => $exercise->id,
            ]);
        });
    }

    public function activity()
    {
        return $this->morphOne(Activity::class, 'doable');
    }

    public function keywords()
    {
        return $this->with('activity.keywords');
    }

    public function programs()
    {
        return $this->with('activity.programs');
    }
}
