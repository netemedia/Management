<?php

namespace App\Http\Livewire\Modals\Clients;

use App\Client;
use App\Http\Requests\UpdateClientRequest;
use Livewire\Component;

class Edit extends Component
{
    public bool $opened = false;
    public string $name = '';
    public string $oldName = '';
    public ?string $clientId = null;

    protected $listeners = [
        'EditClient' => 'toggle'
    ];

    public function render()
    {
        return view('livewire.modals.clients.edit');
    }

    public function toggle(?string $id = null)
    {
        $this->opened = ! $this->opened;
        $this->clientId = $id;
        $client = Client::find($this->clientId);
        $this->name = $client ? $client->name : '';
        $this->oldName = $client ? $client->name : '';
    }

    public function update(string $id)
    {
        $client = Client::find($id);
        $rules = (new UpdateClientRequest())->rules($id);
        $this->validate($rules);
        $client->update([
            'name' => $this->name
        ]);
        $this->toggle($id);
        $this->emit('ClientUpdated');
    }
}
