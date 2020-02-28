<?php

namespace App\Http\Livewire\Filters\Resources;

use Livewire\Component;

class Tasks extends Component
{
    public bool $done = false;
    public ?string $search = null;

    public function render()
    {
        return view('livewire.filters.resources.tasks');
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
        ];
    }
}
