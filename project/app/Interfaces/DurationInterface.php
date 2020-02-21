<?php

namespace App\Interfaces;

interface DurationInterface
{

    public function getHumanReadableDurationAttribute() : string;

    public function getHumanReadableStartTimeAttribute() : string;

    public function getHumanReadableEndTimeAttribute() : string;
}