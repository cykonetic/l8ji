<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\CourseUser
 *
 * @property int $course_id
 * @property int $user_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseUser whereUserId($value)
 * @mixin \Eloquent
 */
class CourseUser extends Pivot
{
    const TYPE_HOST = 'host';
    const TYPE_COHOST = 'co-host';
    const TYPE_PARTICIPANT = 'participant';

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
