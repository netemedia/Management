<?php

namespace App\Http\Livewire\Tasks;

use App\Project;
use App\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public ?string $project_id = null;
    public ?string $resource_id = null;
    public ?string $search = null;
    public bool $done = false;
    protected $listeners = [
        'TaskAdded'   => 'render',
        'TaskUpdated' => 'render',
        'TaskDeleted' => 'render',
        'SearchTask'  => 'search',
    ];

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
        $this->initTasks();
    }

    public function search(array $data)
    {
        $this->search      = $data['search'];
        $this->project_id  = $data['project_id'];
        $this->done        = $data['done'];
        $this->resource_id = $data['resource_id'];
    }

    public function edit(string $id, ?string $project_id = null)
    {
        $this->emit('EditTask', $id, $this->project_id);
    }

    public function delete(string $id, ?string $project_id = null)
    {
        $this->emit('DeleteTask', $id, $this->project_id);
    }

    public function eraseDay(string $id)
    {
        $task = Task::find($id);
        $task->day = null;
        $task->save();
        $this->emit('TaskUpdated');
    }

    public function render()
    {
        $tasks = $this->initTasks();
        $hours = $tasks->sum('estimation');

        return view('livewire.tasks.table', compact('tasks', 'hours'));
    }

    public function changeStatus(string $id)
    {
        $task       = Task::find($id);
        $task->done = ! $task->done;
        $task->save();
        $this->emit('StatusChanged');
    }

    private function initTasks()
    {
        if ( ! empty($this->project_id) ) {
            $project = Project::find($this->project_id);

            $tasks = $project->tasks()->orderBy('day')->where('title', 'LIKE', "%$this->search%");
        }
        else {
            $tasks = Task::orderBy('day')->where('title', 'LIKE', "%$this->search%");
        }

        $tasks = $tasks->where('done', $this->done);

        if ( $this->resource_id ) {
            $tasks = $tasks->where('resource_id', $this->resource_id);
        }
        $tasks = $tasks->paginate(25);

        return $tasks;
    }
}
