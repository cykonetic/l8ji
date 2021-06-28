<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface IDoable
{
    // Require the implementing class to have an Activity morph
    public function activity(): MorphOne;
}
