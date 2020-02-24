<?php

namespace App\Http\Livewire\Resources;

use App\Resource;
use App\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;
    public string $resource_id;
    protected $listeners = [
        'TaskAdded'    => 'render',
        'TaskUpdated'  => 'render',
        'TasksDeleted' => 'render',
    ];

    public function mount(string $resource_id)
    {
        $this->resource_id = $resource_id;
    }

    public function render()
    {
        $resource = Resource::find($this->resource_id);
        $tasks    = $resource->tasks()->orderBy('day')->paginate(25);

        return view('livewire.resources.tasks', compact('tasks'));
    }

    public function edit(string $id)
    {
        $this->emit('EditTask', $id);
    }

    public function delete(string $id)
    {
        $this->emit('DeleteTask', $id);
    }

    public function changeStatus(string $id)
    {
        $task       = Task::find($id);
        $task->done = ! $task->done;
        $task->save();
        $this->emit('StatusChanged');
    }
}
