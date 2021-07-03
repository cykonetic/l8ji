<?php

namespace App\Models;

use App\Models\Interfaces\DoableContract;
use App\Models\Traits\Doable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Measure
 *
 * @property int $id
 * @property string $conversation
 * @property float $min_score
 * @property float $max_score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @method static \Illuminate\Database\Eloquent\Builder|Measure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Measure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Measure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereConversation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereMaxScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereMinScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Measure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Measure extends Model implements DoableContract
{
    use Doable;

    protected $guarded = [];
}
