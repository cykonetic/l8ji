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
 * App\Models\Exercise
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
 * @method static Builder|Exercise newModelQuery()
 * @method static Builder|Exercise newQuery()
 * @method static Builder|Exercise query()
 * @method static Builder|Exercise whereCreatedAt($value)
 * @method static Builder|Exercise whereDeletedAt($value)
 * @method static Builder|Exercise whereDescription($value)
 * @method static Builder|Exercise whereDuration($value)
 * @method static Builder|Exercise whereId($value)
 * @method static Builder|Exercise whereName($value)
 * @method static Builder|Exercise whereUpdatedAt($value)
 * @method static Builder|Exercise whereUrl($value)
 * @mixin Eloquent
 */
class Exercise extends Model implements IProgramable, IKeywordable
{
    use Keywordable, Programable;

    protected $guarded = [];
}
