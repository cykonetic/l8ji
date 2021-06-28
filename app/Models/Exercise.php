<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Interfaces\IKeywordable;
use App\Models\Interfaces\IProgramable;
use App\Models\Traits\Doable;
use App\Models\Traits\Keywordable;
use App\Models\Traits\Programable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exercise
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property int $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pivots\ActivityKeyword[] $activityKeywords
 * @property-read int|null $activity_keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pivots\ProgramActivity[] $programActivities
 * @property-read int|null $program_activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUrl($value)
 * @mixin \Eloquent
 */
class Exercise extends Model implements IDoable, IKeywordable, IProgramable
{
    use Doable;
    use Keywordable;
    use Programable;

    protected $guarded = [];
}
