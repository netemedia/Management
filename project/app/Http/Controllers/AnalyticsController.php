<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function __invoke(Request $request)
    {
        $carbon = new Carbon($request->get('date', null));
        $date   = $carbon->format('Y-m-d');
        $next   = $carbon->endOfWeek()->format('Y-m-d');
        $tasks  = Task::where('day', '>=', $date)
                      ->where('day', '<=', $next)
                      ->orderBy('day')
                      ->paginate(25);

        return view('analytics', compact('tasks', 'date', 'next'));
    }
}
