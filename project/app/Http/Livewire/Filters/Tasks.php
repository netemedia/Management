<?php

namespace App\Http\Livewire\Filters;

use App\Http\Forms\ResourceForm;
use Livewire\Component;

class Tasks extends Component
{
    public ?string $search = '';
    public ?string $project_id = null;
    public ?string $resource_id = null;
    public bool $done = false;

    public function mount(?string $project_id = null)
    {
        $this->project_id = $project_id;
    }

    public function render()
    {
        $selectResources = ResourceForm::select();
        return view('livewire.filters.tasks', compact('selectResources'));
    }

    public function search()
    {
        $this->emit('SearchTask', $this->searchData());
    }

    public function toggleDisplayDoneTasks()
    {
        $this->done = ! $this->done;
        $this->emit('SearchTask', $this->searchData());
    }

    public function reinit()
    {
        $this->search = null;
        $this->emit('SearchTask', $this->searchData());
    }

    protected function searchData() : array
    {
        return [
            'search'      => $this->search,
            'done'        => $this->done,
            'project_id'  => $this->project_id,
            'resource_id' => $this->resource_id,
        ];
    }
}
