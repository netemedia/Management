<?php

namespace App\Http\Livewire\Modals\Projects;

use App\Http\Livewire\ModalComponent;
use App\Http\Livewire\Support\Destroyer;
use App\Project;

class Delete extends ModalComponent implements Destroyer
{
    public bool $opened = false;
    public string $name = '';
    public ?string $projectId = null;
    public ?string $client_id = null;
    protected $listeners = [
        'DeleteProject' => 'up',
    ];

    public function mount(?string $client_id = null)
    {
        $this->client_id = $client_id;
    }

    public function render()
    {
        return view('livewire.modals.projects.delete');
    }

    public function up(string $id)
    {
        $this->projectId = $id;
        $project         = Project::find($this->projectId);
        $this->name      = $project ? $project->name : '';
        $this->open();
    }

    public function destroy()
    {
        $project = Project::find($this->projectId);
        $project->delete();
        $this->emit('ProjectDeleted', $this->client_id);
        $this->close();
    }
}
