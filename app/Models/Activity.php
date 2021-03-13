<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

/**
 * App\Models\Activity.
 *
 * @property int                                                            $activity_id
 * @property string                                                         $activity_type
 * @property string                                                         $name
 * @property string                                                         $description
 * @property \Illuminate\Support\Carbon|null                                $created_at
 * @property \Illuminate\Support\Carbon|null                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                $deleted_at
 * @property Model|\Eloquent                                                $activity
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property int|null                                                       $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property int|null                                                       $programs_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Query\Builder|Activity onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Activity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Activity withoutTrashed()
 * @mixin \Eloquent
 */
class Activity extends MorphPivot
{
    protected $guarded = [];
    protected $incrementing = true;

    public function doable()
    {
        return $this->morphTo();
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_activities');
    }
}
/*



    public function activities()
    {
        if (in_array('activities', get_class_methods($this->activity_type), true)) {
            return $this->belongsToMany(Activity::class, 'program_activity')
            ->withPivot('sequence');
        }

        return null;
    }

    public function detail()
    {
        if (in_array('detail', get_class_methods($this->activity_type), true)) {
            $detailClassName = $this->activity_type.'Detail';
            $foreignKeyName = strtolower(class_basename($this->activity_type)).'_id';

            return $this->hasOne($detailClassName, $foreignKeyName);
        }

        return null;
    }
*/
