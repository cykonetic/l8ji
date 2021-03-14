<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

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
class Activity extends MorphPivot
{
    protected $guarded = [];
    protected $table = 'activities';

    public $incrementing = true;
    public $timestamps = false;

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
        return $this->belongsToMany(Program::class)
            ->using(ProgramActivity::class);
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
