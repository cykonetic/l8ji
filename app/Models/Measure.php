<?php

namespace App\Models;

use App\Interdaces\CanDoInterface;
use App\Traits\CanDoTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Measure.
 *
 * @property int                                                            $activity_id
 * @property string                                                         $activity_type
 * @property string                                                         $name
 * @property string                                                         $description
 * @property \Illuminate\Support\Carbon|null                                $created_at
 * @property \Illuminate\Support\Carbon|null                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                $deleted_at
 * @property \App\Models\Activity|null                                      $activity
 * @property \App\Models\MeasureDetail|null                                 $detail
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property int|null                                                       $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property int|null                                                       $programs_count
 *
 * @method static Builder|Measure newModelQuery()
 * @method static Builder|Measure newQuery()
 * @method static Builder|Measure query()
 * @method static Builder|Measure whereActivityId($value)
 * @method static Builder|Measure whereActivityType($value)
 * @method static Builder|Measure whereCreatedAt($value)
 * @method static Builder|Measure whereDeletedAt($value)
 * @method static Builder|Measure whereDescription($value)
 * @method static Builder|Measure whereName($value)
 * @method static Builder|Measure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Measure extends Model implements CanDoInterface
{
    use HasFactory;
    use CanDoTrait;
}
