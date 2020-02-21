<?php

namespace App\Http\View\Components;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Netemedia\Component\Component;

class WeekTasks extends Component
{
    public string $title = 'Avancement de la semaine';

    public function data()
    {
        $request = app('request');
        $carbon  = new Carbon($request->get('date', null));
        $date    = $carbon->startOfWeek()->format('Y-m-d');
        $next    = $carbon->endOfWeek()->format('Y-m-d');
        $tasks   = Task::where('start_date', '>=', $date)->where('start_date', '<=', $next);
        $all     = $tasks->count();
        $done    = $tasks->where('done', true)->count();

        return compact('done', 'all');
    }
}