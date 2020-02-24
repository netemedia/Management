<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class Resources extends Component
{
    public ?string $search = '';

    public function render()
    {
        return view('livewire.filters.resources');
    }

    public function search()
    {
        $this->emit('SearchResource', $this->search);
    }

    public function reinit()
    {
        $this->search = null;
        $this->emit('SearchResource');
    }
}
