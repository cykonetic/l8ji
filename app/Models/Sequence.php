<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Models\Sequence
 *
 * @property int $id
 * @property int $program_id
 * @property int $activity_id
 * @property int|null $sequence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sequence onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Sequence withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sequence withoutTrashed()
 * @mixin \Eloquent
 */
class Sequence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'program_activity';
}
