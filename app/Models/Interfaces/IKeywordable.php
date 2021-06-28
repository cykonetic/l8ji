<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface IKeywordable
{
    public function activityKeywords(): MorphToMany;
}
