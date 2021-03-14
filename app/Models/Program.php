<?php

namespace App\Models;

use App\Interfaces\CanDoInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Program
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static Builder|Program newModelQuery()
 * @method static Builder|Program newQuery()
 * @method static \Illuminate\Database\Query\Builder|Program onlyTrashed()
 * @method static Builder|Program query()
 * @method static Builder|Program whereCreatedAt($value)
 * @method static Builder|Program whereDeletedAt($value)
 * @method static Builder|Program whereDescription($value)
 * @method static Builder|Program whereId($value)
 * @method static Builder|Program whereName($value)
 * @method static Builder|Program whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Program withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Program withoutTrashed()
 * @mixin \Eloquent
 */
class Program extends Model implements CanDoInterface
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::created(function (CanDoInterface $doable) {
            $activity = Activity::create([
                'doable_type' => get_class($doable),
                'doable_id' => $doable->id,
            ]);
            $activity->saveQuietly();
        });
    }

    /**
     *
     */
    public function sequences()
    {
        return $this->hasMany(Sequence::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class)
            ->using(ProgramActivity::class);
    }

    public function exercises()
    {
        return $this->hasManyThrough(
            Exercise::class,
            ProgramActivity::class,
            'program_id',
            'activty_id',
            'id',
            'id'
        );
    }

    public function journals()
    {
        return $this->hasManyThrough(
            Journal::class,
            ProgramActivity::class,
            'program_id',
            'activty_id',
            'id',
            'id'
        );
    }

    public function lessons()
    {
        return $this->hasManyThrough(
            Lesson::class,
            ProgramActivity::class,
            'program_id',
            'activty_id',
            'id',
            'id'
        );
    }

    public function measures()
    {
        return $this->hasManyThrough(
            Measure::class,
            ProgramActivity::class,
            'program_id',
            'activty_id',
            'id',
            'id'
        );
    }
}
