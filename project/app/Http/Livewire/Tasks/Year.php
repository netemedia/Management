<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Carbon\Carbon;
use Livewire\Component;

class Year extends Component
{
    public string $title;
    protected $listeners = [
        'StatusChanged' => 'render',
    ];

    public function mount()
    {
        $year = Carbon::now()->year;
        $this->title = "Tickets traités | $year";
    }

    public function render()
    {
        $from = Carbon::now()->startOfYear();
        $to = Carbon::now()->endOfYear();
        $tasks = Task::where('day', '>=', $from)->where('day', '<=', $to)->where('done', true);
        $done = $tasks->count();
        $hours = $tasks->sum('estimation');

        return view('livewire.tasks.year', compact('done', 'hours'));
    }
}
