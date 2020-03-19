<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class Projects extends Component
{
    public ?string $search = '';
    public ?string $client_id = null;
    public bool $innovations = false;

    public function mount(?string $client_id = null)
    {
        $this->client_id = $client_id;
    }

    public function render()
    {
        return view('livewire.filters.projects');
    }

    public function search()
    {
        $this->emit('SearchProject', $this->searchData());
    }

    protected function searchData() : array
    {
        return [
            'search'      => $this->search,
            'innovations' => $this->innovations,
            'client_id'   => $this->client_id,
        ];
    }

    public function reinit()
    {
        $this->search = null;
        $this->emit('SearchProject', null, $this->client_id);
    }

    public function toggleDisplayInnovations()
    {
        $this->innovations = ! $this->innovations;
        $this->emit('SearchProject', $this->searchData());
    }
}
