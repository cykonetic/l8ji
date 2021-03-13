<?php

namespace App\Models;

use App\Interdaces\CanDoInterface;
use App\Traits\CanDoTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lesson.
 *
 * @property int                                                            $activity_id
 * @property string                                                         $activity_type
 * @property string                                                         $name
 * @property string                                                         $description
 * @property \Illuminate\Support\Carbon|null                                $created_at
 * @property \Illuminate\Support\Carbon|null                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                $deleted_at
 * @property \App\Models\Activity|null                                      $activity
 * @property \App\Models\LessonDetail|null                                  $detail
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property int|null                                                       $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property int|null                                                       $programs_count
 *
 * @method static Builder|Lesson newModelQuery()
 * @method static Builder|Lesson newQuery()
 * @method static Builder|Lesson query()
 * @method static Builder|Lesson whereActivityId($value)
 * @method static Builder|Lesson whereActivityType($value)
 * @method static Builder|Lesson whereCreatedAt($value)
 * @method static Builder|Lesson whereDeletedAt($value)
 * @method static Builder|Lesson whereDescription($value)
 * @method static Builder|Lesson whereName($value)
 * @method static Builder|Lesson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Lesson extends Model implements CanDoInterface
{
    use HasFactory;
    use CanDoTrait;
}
