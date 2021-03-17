<?php

namespace App\Models;


use App\Interfaces\ICanDo;
use App\Interfaces\IKeywords;
use App\Traits\CanDo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Exercise
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
 * @method static Builder|Exercise newModelQuery()
 * @method static Builder|Exercise newQuery()
 * @method static \Illuminate\Database\Query\Builder|Exercise onlyTrashed()
 * @method static Builder|Exercise query()
 * @method static Builder|Exercise whereCreatedAt($value)
 * @method static Builder|Exercise whereDeletedAt($value)
 * @method static Builder|Exercise whereDescription($value)
 * @method static Builder|Exercise whereDuration($value)
 * @method static Builder|Exercise whereId($value)
 * @method static Builder|Exercise whereName($value)
 * @method static Builder|Exercise whereUpdatedAt($value)
 * @method static Builder|Exercise whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|Exercise withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Exercise withoutTrashed()
 * @mixin \Eloquent
 */
class Exercise extends Model implements ICanDo, IKeywords
{
    use HasFactory;
    use SoftDeletes;
    use CanDo;

    protected $guarded = [];
}
