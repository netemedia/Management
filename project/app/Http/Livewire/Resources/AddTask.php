<?php

namespace App\Http\Livewire\Resources;

use App\Http\Forms\ProjectForm;
use App\Http\Livewire\CreatorComponent;
use App\Http\Livewire\Support\Form\Reinitable;
use App\Http\Requests\AddTaskToResourceRequest;
use App\Resource;

class AddTask extends CreatorComponent implements Reinitable
{
    public ?string $project_id = null;
    public ?string $title = null;
    public ?string $url = null;
    public ?string $estimation = null;
    public ?string $day = null;
    public ?string $resource_id = null;

    public function mount(?string $resource_id)
    {
        $this->resource_id = $resource_id;
    }

    public function render()
    {
        $selectProjects = ProjectForm::select();

        return view('livewire.resources.add-task', compact('selectProjects'));
    }

    public function create()
    {
        $rules = ( new AddTaskToResourceRequest() )->rules();
        $validated = $this->validate($rules);
        $resource = Resource::find($this->resource_id);

        $task = $resource->tasks()->create($validated);
        $task->done = false;
        $task->save();

        $this->emit('TaskAdded');
        $this->reinit();
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
        $this->title = null;
        $this->url = null;
        $this->estimation = null;
        $this->day = null;
        $this->project_id = null;
    }
}
