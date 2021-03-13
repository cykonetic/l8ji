<?php

namespace App\Models;

use App\Interdaces\CanDoInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Program.
 *
 * @property int                                                             $activity_id
 * @property string                                                          $activity_type
 * @property string                                                          $name
 * @property string                                                          $description
 * @property \Illuminate\Support\Carbon|null                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                 $updated_at
 * @property \Illuminate\Support\Carbon|null                                 $deleted_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activities
 * @property int|null                                                        $activities_count
 * @property \App\Models\Activity|null                                       $activity
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[]  $keywords
 * @property int|null                                                        $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|Program[]              $programs
 * @property int|null                                                        $programs_count
 *
 * @method static Builder|Program newModelQuery()
 * @method static Builder|Program newQuery()
 * @method static Builder|Program query()
 * @method static Builder|Program whereActivityId($value)
 * @method static Builder|Program whereActivityType($value)
 * @method static Builder|Program whereCreatedAt($value)
 * @method static Builder|Program whereDeletedAt($value)
 * @method static Builder|Program whereDescription($value)
 * @method static Builder|Program whereName($value)
 * @method static Builder|Program whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Program extends Model implements CanDoInterface
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function (CanDoInterface $doable) {
            (new Activity([
                'doable_type' => self::class,
                'doable_id' => $doable->id,
            ]))->save();
        });
    }

    public function sequences()
    {
        $this->hasMany(Sequence::class)
            ->as('sequence')
            ->withPivot('sequence');
    }

    public function activities()
    {
        $this->with('sequences.activity.doable');
    }
}
