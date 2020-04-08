<?php

namespace App\Http\Livewire;

use App\Http\Forms\ResourceForm;
use App\Resource;
use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Agenda extends Component
{
    public string $date;
    public array $days;
    public ?string $resource_id = null;
    public ?string $searchResource = null;
    public $results;
    public bool $showResources = false;
    private Carbon $week;

    public function render()
    {
        $tasks = $this->index();
        $this->results = $this->searchResource();

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
            if ( ! empty (session()->get('resource')) ) {
                $this->resource_id = session()->get('resource');
            }

            return Task::where('day', '>=', $this->days['Lundi'])
                       ->where('day', '<=', $this->days['Vendredi'])
                       ->orderBy('day')
                       ->orderBy('done')
                       ->orderBy('resource_id')
                       ->orderBy('project_id')
                       ->get();
        }

        session()->put('resource', $this->resource_id);

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

    public function searchResource()
    {
        return Resource::where('first_name', 'like', "%{$this->searchResource}%")->get();
    }

    public function setResource(string $id)
    {
        $resource = Resource::find($id);
        session()->put('resource', $id);
        $this->resource_id = $id;
        $this->searchResource = $resource->first_name;
    }

    public function refresh()
    {
        session()->put('resource', '');
        $this->resource_id = null;
        $this->searchResource = null;
    }

    public function showResources ()
    {
        $this->searchResource = null;
        $this->showResources = true;
    }

    public function hideResources ()
    {
        $this->showResources = false;
    }
}
