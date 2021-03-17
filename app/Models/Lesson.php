<?php

namespace App\Models;

use App\Models\Interfaces\ICanDo;
use App\Models\Interfaces\IKeywords;
use App\Models\Traits\CanDo;
use App\Models\Traits\Keywords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Lesson newModelQuery()
 * @method static Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Query\Builder|Lesson onlyTrashed()
 * @method static Builder|Lesson query()
 * @method static Builder|Lesson whereCreatedAt($value)
 * @method static Builder|Lesson whereDeletedAt($value)
 * @method static Builder|Lesson whereDescription($value)
 * @method static Builder|Lesson whereDuration($value)
 * @method static Builder|Lesson whereId($value)
 * @method static Builder|Lesson whereName($value)
 * @method static Builder|Lesson whereUpdatedAt($value)
 * @method static Builder|Lesson whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|Lesson withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Lesson withoutTrashed()
 * @mixin \Eloquent
 */
class Lesson extends Model implements ICanDo, IKeywords
{
    use HasFactory;
    use SoftDeletes;
    use CanDo;
    use Keywords;

    protected $guarded = [];
}
