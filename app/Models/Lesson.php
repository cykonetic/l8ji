<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Interfaces\IKeywordable;
use App\Models\Interfaces\IProgramable;
use App\Models\Traits\Doable;
use App\Models\Traits\Keywordable;
use App\Models\Traits\Programable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lesson
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
 * @method static Builder|Lesson newModelQuery()
 * @method static Builder|Lesson newQuery()
 * @method static Builder|Lesson query()
 * @method static Builder|Lesson whereCreatedAt($value)
 * @method static Builder|Lesson whereDeletedAt($value)
 * @method static Builder|Lesson whereDescription($value)
 * @method static Builder|Lesson whereDuration($value)
 * @method static Builder|Lesson whereId($value)
 * @method static Builder|Lesson whereName($value)
 * @method static Builder|Lesson whereUpdatedAt($value)
 * @method static Builder|Lesson whereUrl($value)
 * @mixin \Eloquent
 */
class Lesson extends Model implements IDoable, IKeywordable, IProgramable
{
    use Doable;
    use Keywordable;
    use Programable;

    protected $guarded = [];
}
