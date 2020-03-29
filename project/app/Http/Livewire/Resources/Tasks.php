<?php

namespace App\Http\Livewire\Resources;

use App\Project;
use App\Resource;
use App\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;
    public string $resource_id;
    public ?string $search = null;
    public bool $done = false;
    protected $listeners = [
        'TaskAdded'    => 'render',
        'TaskUpdated'  => 'render',
        'TasksDeleted' => 'render',
        'SearchTask'   => 'search',
    ];

    public function search(array $data)
    {
        $this->search = $data['search'];
        $this->done   = $data['done'];
    }

    public function mount(string $resource_id)
    {
        $this->resource_id = $resource_id;
        $this->initTasks();
    }

    public function render()
    {
        $tasks = $this->initTasks();
        $hours = $tasks->sum('estimation');

        return view('livewire.resources.tasks', compact('tasks', 'hours'));
    }

    public function edit(string $id)
    {
        $this->emit('EditTask', $id);
    }

    public function delete(string $id)
    {
        $this->emit('DeleteTask', $id);
    }

    private function initTasks()
    {
        $resource = Resource::find($this->resource_id);
        $tasks    = $resource->tasks()
                             ->where('done', $this->done)
                             ->where('title', 'LIKE', "%{$this->search}%")
                             ->orderBy('day')
                             ->paginate(25);

        return $tasks;
    }

    public function changeStatus(string $id)
    {
        $task       = Task::find($id);
        $task->done = ! $task->done;
        $task->save();
        $this->emit('StatusChanged');
    }

    public function eraseDay(string $id)
    {
        $task = Task::find($id);
        $task->day = null;
        $task->save();
        $this->emit('TaskUpdated');
    }

}
