<?php

namespace App\Http\Livewire\Tasks;

use App\Http\Livewire\Properties\TasksProperty;
use App\Task;
use Carbon\Carbon;
use Livewire\Component;

class Week extends Component
{
    public string $title;

    public function mount(string $title)
    {
        $this->title = $title;
    }

    public function getTasksProperty() : TasksProperty
    {
        $request = app('request');
        $carbon  = new Carbon($request->get('date', null));
        $date    = $carbon->startOfWeek()->format('Y-m-d');
        $next    = $carbon->endOfWeek()->format('Y-m-d');
        $tasks   = Task::where('day', '>=', $date)->where('day', '<=', $next);
        $all     = $tasks->count();
        $done    = $tasks->where('done', true)->count();

        return new TasksProperty($done, $all);
    }

    public function render()
    {
        $data = [
            'title'      => $this->title,
            'properties' => $this->tasks,
        ];

        return view('livewire.tasks.week', $data);
    }
}
