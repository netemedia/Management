<?php

namespace App\Http\Livewire\Modals\Tasks;

use App\Http\Forms\ResourceForm;
use App\Http\Requests\AddTaskToProjectRequest;
use App\Http\Requests\UpdateTaskToProjectRequest;
use App\Project;
use App\Task;
use Livewire\Component;

class Edit extends Component
{
    public bool $opened = false;
    public ?string $task_id = null;
    public ?string $old_title = null;
    public ?string $title = null;
    public ?string $url = null;
    public ?string $estimation = null;
    public ?string $day = null;
    public ?string $resource_id = null;
    public ?string $project_id = null;
    protected $listeners = [
        'EditTask' => 'toggle',
    ];

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.modals.tasks.edit', compact('selectResources'));
    }

    public function toggle(?string $id = null)
    {
        $this->opened      = ! $this->opened;
        $task              = Task::find($id);
        $this->old_title   = $task ? $task->title : null;
        $this->title       = $task ? $task->title : null;
        $this->url         = $task ? $task->url : null;
        $this->estimation  = $task ? $task->estimation : null;
        $this->day         = $task ? $task->day : null;
        $this->resource_id = $task ? $task->resource_id : null;
        $this->task_id     = $task ? $task->id : null;
    }

    public function editTask(string $id, ?string $project_id = null)
    {
        $rules     = ( new UpdateTaskToProjectRequest() )->rules();
        $validated = $this->validate($rules);
        $task      = Task::find($id);

        $task->update($validated);

        $this->toggle($id);
        $this->emit('TaskUpdated', $this->project_id);
    }
}
