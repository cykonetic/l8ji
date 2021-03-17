<?php

namespace App\Models\Interfaces;

interface ICanDo
{
    // Require the implementing class to have an Activity morph
    public function activity();
}
