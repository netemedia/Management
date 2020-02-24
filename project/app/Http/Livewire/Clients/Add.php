<?php

namespace App\Http\Livewire\Clients;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use Livewire\Component;

class Add extends Component
{
    public ?string $name = null;

    public function render()
    {
        return view('livewire.clients.add');
    }

    public function add()
    {
        $rules     = ( new CreateClientRequest() )->rules();
        $validated = $this->validate($rules);
        Client::create($validated);

        $this->emit('ClientAdded');
        $this->reinit();
    }

    public function reinit()
    {
        $this->name = null;
    }
}
