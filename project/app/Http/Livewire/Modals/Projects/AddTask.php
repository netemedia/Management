<?php

namespace App\Http\Livewire\Modals\Projects;

use App\Http\Livewire\ModalComponent;
use App\Http\Forms\ResourceForm;
use App\Http\Requests\AddTaskToProjectRequest;
use App\Project;

class AddTask extends ModalComponent
{
    public ?string $project_name = null;
    public ?string $project_id = null;
    public ?string $title = null;
    public ?string $url = null;
    public ?string $estimation = null;
    public ?string $day = null;
    public ?string $resource_id = null;
    public ?string $client_id = null;
    protected $listeners = [
        'AddTaskToProject' => 'up',
    ];

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.modals.projects.add-task', compact('selectResources'));
    }

    public function up(string $id)
    {
        $this->project_id   = $id;
        $project            = Project::find($id);
        $this->project_name = $project ? $project->name : '';
        $this->open();
    }

    public function create(string $id)
    {
        $rules     = ( new AddTaskToProjectRequest() )->rules();
        $validated = $this->validate($rules);
        $project   = Project::find($id);

        $task       = $project->tasks()->create($validated);
        $task->done = false;
        $task->save();

        $this->close();
        $this->emit('TaskAdded');
    }
}
