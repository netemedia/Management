<?php

namespace App\Http\Livewire\Tasks;

use App\Project;
use App\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public ?string $project_id = null;
    private Paginator $tasks;
    protected $listeners = [
        'TaskAdded'    => 'render',
        'TaskUpdated'  => 'render',
        'TasksDeleted' => 'render',
    ];
    public bool $displayDoneTasks = false;

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
        $this->initTasks();
    }

    public function edit(string $id, ?string $project_id = null)
    {
        $this->emit('EditTask', $id, $this->project_id);
    }

    public function delete(string $id, ?string $project_id = null)
    {
        $this->emit('DeleteTask', $id, $this->project_id);
    }

    public function render()
    {
        $tasks = $this->initTasks();

        return view('livewire.tasks.table', compact('tasks'));
    }

    private function initTasks()
    {
        if ( empty($this->project_id) ) {
            return $this->tasks ?? Task::orderBy('day')->paginate(25);
        }

        $project = Project::find($this->project_id);

        return $this->tasks ?? $project->tasks()->orderBy('day')->paginate(25);
    }
}
