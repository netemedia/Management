<?php

namespace App\Http\Livewire\Modals\Projects;

use App\Http\Forms\ResourceForm;
use App\Http\Requests\AddTaskToProjectRequest;
use App\Project;
use Livewire\Component;

class AddTask extends Component
{
    public bool $opened = false;
    public ?string $project_name = null;
    public ?string $project_id = null;
    public ?string $title = null;
    public ?string $url = null;
    public ?string $estimation = null;
    public ?string $day = null;
    public ?string $resource_id = null;
    public ?string $client_id = null;
    protected $listeners = [
        'AddTaskToProject' => 'toggle',
    ];

    public function mount(?string $client_id = null)
    {
        $this->client_id = $client_id;
    }

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.modals.projects.add-task', compact('selectResources'));
    }

    public function toggle(?string $id = null)
    {
        $this->opened       = ! $this->opened;
        $this->project_id   = $id;
        $project            = Project::find($id);
        $this->project_name = $project ? $project->name : '';
    }

    public function addTask(string $id, ?string $client_id = null)
    {
        $rules             = ( new AddTaskToProjectRequest() )->rules();
        $validated         = $this->validate($rules);
        $project           = Project::find($id);

        $task = $project->tasks()->create($validated);
        $task->done = false;
        $task->save();

        $this->toggle($id);
        $this->emit('TaskAdded');
    }
}
