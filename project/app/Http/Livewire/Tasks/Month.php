<?php

namespace App\Http\Livewire\Tasks;

use App\Http\Livewire\Properties\TasksProperty;
use App\Task;
use Carbon\Carbon;
use Carbon\Translator;
use Livewire\Component;

class Month extends Component
{
    public int $month;
    public string $title;
    protected $listeners = [
        'StatusChanged' => 'render',
    ];

    public function mount()
    {
        $this->month = Carbon::now()->month;
        $carbon      = Carbon::now()->setMonth($this->month)->locale('fr_FR');
        $this->title = "Tickets terminés | {$carbon->getTranslatedMonthName()} {$carbon->year}";
    }

    public function nextMonth()
    {
        $this->month++;
    }

    public function previousMonth()
    {
        $this->month--;
    }

    public function resetMonth()
    {
        $this->month = Carbon::now()->month;
    }

    public function getTasksProperty() : TasksProperty
    {
        $carbon      = Carbon::now()->setMonth($this->month)->locale('fr_FR');
        $this->title = "Tickets terminés | {$carbon->getTranslatedMonthName()} {$carbon->year}";
        $from        = $carbon->startOfMonth()->format('Y-m-d');
        $to          = $carbon->endOfMonth()->format('Y-m-d');
        $tasks       = Task::where('day', '>=', $from)->where('day', '<=', $to);
        $all         = $tasks->count();
        $done        = $tasks->where('done', true)->count();

        return new TasksProperty($done, $all);
    }

    public function render()
    {
        $data = [ 'properties' => $this->tasks ];

        return view('livewire.tasks.month', $data);
    }
}
