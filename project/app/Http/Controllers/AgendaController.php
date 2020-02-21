<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function __invoke(Request $request) : View
    {
        $carbon = new Carbon($request->get('date', null));
        $date   = $carbon->format('Y-m-d');
        $next   = $carbon->endOfWeek()->format('Y-m-d');
        $tasks  = Task::where('start_date', '>=', $date)
                      ->where('start_date', '<=', $next)
                      ->orderBy('start_date')
                      ->paginate(25);

        return view('agenda', compact('tasks', 'date', 'next'));
    }
}
