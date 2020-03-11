<?php

namespace App\Http\Livewire\Clients;

use App\Client;
use App\Http\Livewire\CreatorComponent;
use App\Http\Livewire\Support\Form\Reinitable;
use App\Http\Requests\CreateClientRequest;

class Add extends CreatorComponent implements Reinitable
{
    public ?string $name = null;

    public function render()
    {
        return view('livewire.clients.add');
    }

    public function create()
    {
        $rules     = ( new CreateClientRequest() )->rules();
        $validated = $this->validate($rules);
        Client::create($validated);

        $this->emit('ClientAdded');
        $this->reinit();
    }

    public function reinit(?string $field = null)
    {
        if ( $field ) {
            $this->$field = null;
        }
        else {
            $this->reinitAll();
        }
    }

    public function reinitAll()
    {
        $this->name = null;
    }
}
