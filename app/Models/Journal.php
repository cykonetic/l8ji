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
 * App\Models\Journal
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Activity|null $activity
 * @property-read Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static Builder|Journal newModelQuery()
 * @method static Builder|Journal newQuery()
 * @method static Builder|Journal query()
 * @method static Builder|Journal whereCreatedAt($value)
 * @method static Builder|Journal whereDeletedAt($value)
 * @method static Builder|Journal whereDescription($value)
 * @method static Builder|Journal whereId($value)
 * @method static Builder|Journal whereName($value)
 * @method static Builder|Journal whereUpdatedAt($value)
 * @method static Builder|Journal whereUrl($value)
 * @mixin Eloquent
 */
class Journal extends Model implements IProgramable
{
    use Programable;

    protected $guarded = [];
}
