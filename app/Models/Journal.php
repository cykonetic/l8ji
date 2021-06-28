<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Interfaces\IProgramable;
use App\Models\Traits\Doable;
use App\Models\Traits\Programable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pivots\ProgramActivity[] $programActivities
 * @property-read int|null $program_activities_count
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
 * @mixin \Eloquent
 */
class Journal extends Model implements IDoable, IProgramable
{
    use Doable;
    use Programable;

    protected $guarded = [];
}
