<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class Clients extends Component
{
    public ?string $search = null;

    public function render()
    {
        return view('livewire.filters.clients');
    }

    public function search()
    {
        $this->emit('SearchClient', $this->search);
    }

    public function reinit()
    {
        $this->search = null;
        $this->emit('SearchClient');
    }
}
