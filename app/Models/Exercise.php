<?php

namespace App\Models;

use App\Models\Interfaces\IDoable;
use App\Models\Traits\Doable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exercise
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property int $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exercise whereUrl($value)
 * @mixin \Eloquent
 */
class Exercise extends Model implements IDoable
{
    use Doable;

    protected $guarded = [];
}
