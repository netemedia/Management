<?php

namespace App\Http\Livewire;

use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Agenda extends Component
{
    public string $date;
    public array $days;
    private Carbon $week;

    public function render()
    {
        $tasks = $this->index();

        return view('livewire.agenda', compact('tasks'));
    }

    public function mount()
    {
        $now = Carbon::now();
        $this->week = $now->startOfWeek();

        $this->date = $this->week->format('Y-m-d');
        $current = $this->week;
        $this->days = [
            'Lundi'    => $current->format('Y-m-d'),
            'Mardi'    => $current->addDay()->format('Y-m-d'),
            'Mercredi' => $current->addDay()->format('Y-m-d'),
            'Jeudi'    => $current->addDay()->format('Y-m-d'),
            'Vendredi' => $current->addDay()->format('Y-m-d'),
        ];
    }

    public function changeDate() : void
    {
        $this->week = Carbon::createFromFormat('Y-m-d', $this->date)->startOfWeek();
        $current = $this->week;
        $this->days = [
            'Lundi'    => $current->format('Y-m-d'),
            'Mardi'    => $current->addDay()->format('Y-m-d'),
            'Mercredi' => $current->addDay()->format('Y-m-d'),
            'Jeudi'    => $current->addDay()->format('Y-m-d'),
            'Vendredi' => $current->addDay()->format('Y-m-d'),
        ];
    }

    public function index() : Collection
    {
        return Task::where('day', '>=', $this->days['Lundi'])
                   ->where('day', '<=', $this->days['Vendredi'])
                   ->orderBy('day')
                   ->orderBy('project_id')
                   ->orderBy('resource_id')
                   ->get();
    }
}
