<?php

namespace App\Http\Livewire\Projects;

use App\Project;
use Carbon\Carbon;
use Livewire\Component;

class Year extends Component
{
    public string $title;

    protected $listeners = [
        'StatusChanged' => 'render'
    ];

    public function mount()
    {
        $this->title = "Projets terminés";
    }

    public function render()
    {
        $pending = Project::whereHas('tasks', function($q) {
            $q->where('done', false);
        })->count();
        $all = Project::count();
        $done = $all - $pending;
        return view('livewire.projects.year', compact('done', 'all'));
    }
}
