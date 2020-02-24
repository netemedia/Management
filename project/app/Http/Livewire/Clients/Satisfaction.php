<?php

namespace App\Http\Livewire\Clients;

use App\Client;
use Livewire\Component;

class Satisfaction extends Component
{
    public string $title;

    public function mount(string $title)
    {
        $this->title = $title;
    }

    public function render()
    {
        $all = Client::count();
        return view('livewire.clients.satisfaction', compact('all'));
    }
}
