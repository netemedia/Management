<?php

namespace App\Http\View\Support;

use Carbon\Carbon;

class Date
{
    public static function date(string $date) : string
    {
        return Carbon::createFromFormat('Y-m-d', $date)->locale('fr_FR')->isoFormat('dddd DD MMMM Y');
    }
}