<?php

namespace App\Models;

use App\Interdaces\CanDoInterface;
use App\Traits\CanDoTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Journal.
 *
 * @property int                                                            $activity_id
 * @property string                                                         $activity_type
 * @property string                                                         $name
 * @property string                                                         $description
 * @property \Illuminate\Support\Carbon|null                                $created_at
 * @property \Illuminate\Support\Carbon|null                                $updated_at
 * @property \Illuminate\Support\Carbon|null                                $deleted_at
 * @property \App\Models\Activity|null                                      $activity
 * @property \App\Models\JournalDetail|null                                 $detail
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property int|null                                                       $keywords_count
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property int|null                                                       $programs_count
 *
 * @method static Builder|Journal newModelQuery()
 * @method static Builder|Journal newQuery()
 * @method static Builder|Journal query()
 * @method static Builder|Journal whereActivityId($value)
 * @method static Builder|Journal whereActivityType($value)
 * @method static Builder|Journal whereCreatedAt($value)
 * @method static Builder|Journal whereDeletedAt($value)
 * @method static Builder|Journal whereDescription($value)
 * @method static Builder|Journal whereName($value)
 * @method static Builder|Journal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Journal extends Model implements CanDoInterface
{
    use HasFactory;
    use CanDoTrait;
}
