<?php

namespace App\Http\View\Components;

use App\Task;
use Carbon\Carbon;
use Netemedia\Component\Component;

class DayTasks extends Component
{
    public string $title = 'Avancement de la journée';

    public function data()
    {
        $request = app('request');
        $carbon  = new Carbon($request->get('date', null));
        $date    = $carbon->format('Y-m-d');
        $tasks   = Task::where('start_date', $date);
        $all     = $tasks->count();
        $done    = $tasks->where('done', true)->count();

        return compact('done', 'all');
    }
}