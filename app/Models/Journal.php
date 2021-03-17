<?php

namespace App\Models;

use App\Models\Interfaces\ICanDo;
use App\Models\Traits\CanDo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Journal
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Journal newModelQuery()
 * @method static Builder|Journal newQuery()
 * @method static \Illuminate\Database\Query\Builder|Journal onlyTrashed()
 * @method static Builder|Journal query()
 * @method static Builder|Journal whereCreatedAt($value)
 * @method static Builder|Journal whereDeletedAt($value)
 * @method static Builder|Journal whereDescription($value)
 * @method static Builder|Journal whereId($value)
 * @method static Builder|Journal whereName($value)
 * @method static Builder|Journal whereUpdatedAt($value)
 * @method static Builder|Journal whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|Journal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Journal withoutTrashed()
 * @mixin \Eloquent
 */
class Journal extends Model implements ICanDo
{
    use HasFactory;
    use SoftDeletes;
    use CanDo;

    protected $guarded = [];
}
