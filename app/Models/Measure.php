<?php

namespace App\Models;

use App\Models\Interfaces\IProgramable;
use App\Models\Pivots\Activity;
use App\Models\Traits\Programable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Measure
 *
 * @property int $id
 * @property string $conversation
 * @property float $min_score
 * @property float $max_score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Activity|null $activity
 * @property-read Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Measure newModelQuery()
 * @method static Builder|Measure newQuery()
 * @method static Builder|Measure query()
 * @method static Builder|Measure whereConversation($value)
 * @method static Builder|Measure whereCreatedAt($value)
 * @method static Builder|Measure whereDeletedAt($value)
 * @method static Builder|Measure whereId($value)
 * @method static Builder|Measure whereMaxScore($value)
 * @method static Builder|Measure whereMinScore($value)
 * @method static Builder|Measure whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Measure extends Model implements IProgramable
{
    use Programable;

    protected $guarded = [];
}
