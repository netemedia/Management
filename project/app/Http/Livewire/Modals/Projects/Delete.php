<?php

namespace App\Http\Livewire\Modals\Projects;

use App\Project;
use Livewire\Component;

class Delete extends Component
{
    public bool $opened = false;
    public string $name = '';
    public ?string $projectId = null;
    public ?string $client_id = null;
    protected $listeners = [
        'DeleteProject' => 'toggle',
    ];

    public function mount(?string $client_id = null)
    {
        $this->client_id = $client_id;
    }
    public function render()
    {
        return view('livewire.modals.projects.delete');
    }

    public function toggle(?string $id = null)
    {
        $this->opened    = ! $this->opened;
        $this->projectId = $id;
        $project         = Project::find($this->projectId);
        $this->name      = $project ? $project->name : '';
    }

    public function delete()
    {
        $project = Project::find($this->projectId);
        $project->delete();
        $this->emit('ProjectDeleted', $this->client_id);
        $this->toggle();
    }
}
