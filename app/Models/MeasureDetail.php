<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasureDetail extends Model
{
    use HasFactory;

    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }
}
