<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Traits\Doable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Program extends Model implements IDoable
{
    use Doable;

    protected $guarded = [];

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'program_activity', 'program_id', 'activity_id')
            ->withPivot(['sequence'])
            ->withTimestamps();
    }
}
