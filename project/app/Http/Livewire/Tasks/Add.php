<?php

namespace App\Http\Livewire\Tasks;

use App\Http\Forms\ResourceForm;
use App\Http\Livewire\CreatorComponent;
use App\Http\Livewire\Support\Form\Reinitable;
use App\Http\Requests\AddTaskToProjectRequest;
use App\Project;

class Add extends CreatorComponent implements Reinitable
{
    public ?string $project_id = null;
    public ?string $title = null;
    public ?string $url = null;
    public ?string $estimation = null;
    public ?string $day = null;
    public ?string $resource_id = null;

    public function mount(?string $project_id)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.tasks.add', compact('selectResources'));
    }

    public function reinit(?string $field = null)
    {
        if ( empty($field) ) {
            $this->reinitAll();
        }
        else {
            $this->$field = null;
        }
    }

    public function reinitAll()
    {
        $this->title       = null;
        $this->url         = null;
        $this->estimation  = null;
        $this->day         = null;
        $this->resource_id = null;
    }

    public function create()
    {
        $rules     = ( new AddTaskToProjectRequest() )->rules();
        $validated = $this->validate($rules);
        $project   = Project::find($this->project_id);

        $task       = $project->tasks()->create($validated);
        $task->done = false;
        $task->save();

        $this->emit('TaskAdded');
        $this->reinit();
    }
}
