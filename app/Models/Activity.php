<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'name',
        'description',
    ];

    public function activity()
    {
        return $this->morphTo();
    }

    public function activities()
    {
        if (in_array('activities', get_class_methods($this->activity_type), true)) {
            return $this->belongsToMany(Activity::class)
            ->using(ProgramActivity::class)
            ->withPivot([
                'sequence',
            ]);
        }

        return null;
    }

    public function detail()
    {
        if (in_array('detail', get_class_methods($this->activity_type), true)) {
            $detailClassName = $this->activity_type.'Detail';
            $foreignKeyName = strtolower(class_basename($this->activity_type)).'_id';

            return $this->hasOne($detailClassName, $foreignKeyName);
        }

        return null;
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'activity_keyword', 'activity_id');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_activity', 'activity_id', 'activity_id')
            ->using(ProgramActivity::class)
            ->withPivot([
                'sequence',
            ]);
    }
}
