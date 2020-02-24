<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class Tasks extends Component
{
    public ?string $search = '';
    public ?string $project_id = null;
    public bool $displayDoneTasks = false;

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        return view('livewire.filters.tasks');
    }

    public function search(?string $project_id = null)
    {
        $this->emit('SearchTask', $this->search, $this->project_id);
    }

    public function toggleDisplayDoneTasks()
    {
        $this->displayDoneTasks = ! $this->displayDoneTasks;
    }

    public function reinit()
    {
        $this->search = null;
        $this->emit('SearchTask', $this->search, $this->project_id);
    }
}
