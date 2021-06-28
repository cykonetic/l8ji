<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Interfaces\IProgramable;
use App\Models\Traits\Doable;
use App\Models\Traits\Programable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Measure
 *
 * @property int $id
 * @property string $conversation
 * @property float $min_score
 * @property float $max_score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pivots\ProgramActivity[] $programActivities
 * @property-read int|null $program_activities_count
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
 * @mixin \Eloquent
 */
class Measure extends Model implements IDoable, IProgramable
{
    use Doable;
    use Programable;

    protected $guarded = [];
}
