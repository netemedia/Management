<?php

namespace App\Http\Livewire\Modals\Clients;

use App\Client;
use Livewire\Component;

class Delete extends Component
{
    public bool $opened = false;
    public string $name = '';
    public ?string $clientId = null;

    protected $listeners = [
        'DeleteClient' => 'toggle'
    ];

    public function render()
    {
        return view('livewire.modals.clients.delete');
    }

    public function toggle(?string $id = null)
    {
        $this->opened = ! $this->opened;
        $this->clientId = $id;
        $client = Client::find($this->clientId);
        $this->name = $client ? $client->name : '';
    }

    public function destroy()
    {
        $client = Client::find($this->clientId);
        $client->delete();
        $this->emit('ClientDeleted');
        $this->toggle();
    }
}
