<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Interfaces\IKeywordable;
use App\Models\Interfaces\IProgramable;
use App\Models\Pivots\ProgramActivity;
use App\Models\Traits\Doable;
use App\Models\Traits\Keywordable;
use App\Models\Traits\Programable;
use Illuminate\Database\Eloquent\Builder;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pivots\ActivityKeyword[] $activityKeywords
 * @property-read int|null $activity_keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|ProgramActivity[] $programActivities
 * @property-read int|null $program_activities_count
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
class Program extends Model implements IDoable, IKeywordable, IProgramable
{
    use Doable;
    use Keywordable;
    use Programable;

    protected $guarded = [];

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'program_activity')
            ->using(ProgramActivity::class)
            ->withPivot(['sequence'])
            ->withTimestamps();
    }
}
