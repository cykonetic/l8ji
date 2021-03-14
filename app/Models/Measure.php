<?php

namespace App\Models;

use App\Interfaces\CanDoInterface;
use App\Traits\CanDoTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Measure
 *
 * @property int $id
 * @property string $class_name
 * @property float $min_score
 * @property float $max_score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @method static Builder|Measure newModelQuery()
 * @method static Builder|Measure newQuery()
 * @method static \Illuminate\Database\Query\Builder|Measure onlyTrashed()
 * @method static Builder|Measure query()
 * @method static Builder|Measure whereClassName($value)
 * @method static Builder|Measure whereCreatedAt($value)
 * @method static Builder|Measure whereDeletedAt($value)
 * @method static Builder|Measure whereId($value)
 * @method static Builder|Measure whereMaxScore($value)
 * @method static Builder|Measure whereMinScore($value)
 * @method static Builder|Measure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Measure withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Measure withoutTrashed()
 * @mixin \Eloquent
 */
class Measure extends Model implements CanDoInterface
{
    use HasFactory;
    use SoftDeletes;
    use CanDoTrait;

    protected $guarded = [];
}
