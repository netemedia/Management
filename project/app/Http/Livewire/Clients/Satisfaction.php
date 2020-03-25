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
        $clients = Client::all();
        $all = $clients->filter(fn($client) => $client->percent_complete > 99)->count();

        return view('livewire.clients.satisfaction', compact('all'));
    }
}
