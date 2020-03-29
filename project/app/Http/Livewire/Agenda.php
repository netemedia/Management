<?php

namespace App\Http\Livewire;

use App\Http\Forms\ResourceForm;
use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Agenda extends Component
{
    public string $date;
    public array $days;
    public ?string $resource_id = null;
    private Carbon $week;

    public function render()
    {
        $tasks = $this->index();
        $selectResources = ResourceForm::select();

        return view('livewire.agenda', compact('tasks', 'selectResources'));
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

    public function update() : void
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
        if ( empty($this->resource_id) ) {
            return Task::where('day', '>=', $this->days['Lundi'])
                       ->where('day', '<=', $this->days['Vendredi'])
                       ->orderBy('day')
                       ->orderBy('done')
                       ->orderBy('resource_id')
                       ->orderBy('project_id')
                       ->get();
        }

        return Task::where('resource_id', $this->resource_id)
                   ->where('day', '>=', $this->days['Lundi'])
                   ->where('day', '<=', $this->days['Vendredi'])
                   ->orderBy('day')
                   ->orderBy('done')
                   ->orderBy('resource_id')
                   ->orderBy('project_id')
                   ->get();
    }

    public function week(int $number)
    {
        $this->week = Carbon::createFromFormat('Y-m-d', $this->date)->startOfWeek()->addWeeks($number);
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
}
