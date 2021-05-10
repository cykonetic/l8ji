<?php

namespace App\Models;

use App\Models\Interfaces\IKeywordable;
use App\Models\Interfaces\IProgramable;
use App\Models\Pivots\Activity;
use App\Models\Traits\Keywordable;
use App\Models\Traits\Programable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property int $duration
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Activity|null $activity
 * @property-read Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
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
 * @mixin Eloquent
 */
class Lesson extends Model implements IProgramable, IKeywordable
{
    use Programable;
    use Keywordable;

    protected $guarded = [];
}
