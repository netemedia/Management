<?php

namespace App\Http\Livewire\Modals\Tasks;

use App\Http\Livewire\ModalComponent;
use App\Http\Livewire\Support\Destroyer;
use App\Task;

class Delete extends ModalComponent implements Destroyer
{
    public ?string $title = null;
    public ?string $project_id = null;
    public ?string $task_id = null;
    protected $listeners = [
        'DeleteTask' => 'up',
    ];

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        return view('livewire.modals.tasks.delete');
    }

    public function destroy()
    {
        $task = Task::find($this->task_id);
        $task->delete();
        $this->emit('TaskDeleted', $this->project_id);
        $this->close();
    }

    public function up(string $id)
    {
        $task          = Task::find($id);
        $this->task_id = $id;
        $this->title   = $task ? $task->title : '';
        $this->open();
    }
}
