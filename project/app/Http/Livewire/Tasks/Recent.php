<?php

namespace App\Http\Livewire\Tasks;

use App\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Recent extends Component
{
    use WithPagination;
    public string $title;
    public bool $displayDoneTasks;

    public function mount(string $title)
    {
        $this->title            = $title;
        $this->displayDoneTasks = false;
    }

    public function changeStatus(string $id)
    {
        $task       = Task::find($id);
        $task->done = ! $task->done;
        $task->save();
        $this->emit('StatusChanged');
    }

    public function toggleDisplayDoneTasks()
    {
        $this->displayDoneTasks = ! $this->displayDoneTasks;
    }

    public function render()
    {
        $tasks = Task::orderBy('day', 'DESC');

        if ( ! $this->displayDoneTasks ) {
            $tasks = $tasks->where('done', false);
        }

        $hours = $tasks->sum('estimation');
        $tasks = $tasks->paginate(10);

        return view('livewire.tasks.recent', compact('tasks', 'hours'));
    }

    public function paginationView()
    {
        return 'vendor.pagination.livewire';
    }
}
