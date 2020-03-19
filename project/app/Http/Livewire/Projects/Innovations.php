<?php

namespace App\Http\Livewire\Projects;

use App\Project;
use Livewire\Component;

class Innovations extends Component
{
    public string $title;

    public function mount(string $title)
    {
        $this->title = $title;
    }

    public function render()
    {
        $all = Project::where('innovation', true)->count();
        return view('livewire.projects.innovations', compact('all'));
    }
}
