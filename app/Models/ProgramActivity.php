<?php

namespace App\Models;

use App\Traits\IsProgramActivity;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ProgramActivity
 *
 * @property int $id
 * @property int $program_id
 * @property int $activity_id
 * @property int|null $sequence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Activity $activity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $exercises
 * @property-read int|null $exercises_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measure[] $measures
 * @property-read int|null $measures_count
 * @property-read \App\Models\Program $program
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Program[] $programs
 * @property-read int|null $programs_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramActivity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProgramActivity extends Pivot
{
    use IsProgramActivity;

    public $incrementing = true;
}
