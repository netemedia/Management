<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function __invoke()
    {
        return view('analytics');
    }
}
