<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface IProgramable
{
    public function programActivities(): MorphToMany;
}
