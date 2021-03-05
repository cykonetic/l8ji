<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->belongsToMany(Activity::class)
            ->using(ProgramActivityLog::class)
            ->withPivot([
                'sequence',
            ]);
    }
}
