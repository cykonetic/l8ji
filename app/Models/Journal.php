<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Activity
{
    protected $table = 'activities';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type', self::class);
        });


        static::creating(function (Journal $journal) {
            $journal->forceFill([
                'type' => self::class
            ]);
        });
    }

    public function detail()
    {
        return $this->hasOne(JournalDetail::class);
    }}
