<?php

namespace App\Http\Livewire\Modals\Tasks;

use App\Task;
use Livewire\Component;

class Delete extends Component
{
    public bool $opened = false;
    public ?string $title = null;
    public ?string $project_id = null;
    public ?string $task_id = null;
    protected $listeners = [
        'DeleteTask' => 'toggle',
    ];

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        return view('livewire.modals.tasks.delete');
    }

    public function toggle(?string $id = null)
    {
        $this->opened  = ! $this->opened;
        $task          = Task::find($id);
        $this->task_id = $id;
        $this->title   = $task ? $task->title : '';
    }

    public function delete()
    {
        $task = Task::find($this->task_id);
        $task->delete();
        $this->emit('TaskDeleted', $this->project_id);
        $this->toggle();
    }
}
