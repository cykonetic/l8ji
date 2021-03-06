<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'journal_id';

    public function journal()
    {
        return $this->belongsTo(Journal::class, $this->primaryKey, 'activity_id', 'activity');
    }
}
