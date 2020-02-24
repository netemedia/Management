<?php

namespace App\Http\Livewire\Clients;

use App\Client;
use App\Http\Livewire\Support\Counter;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;

class Table extends Component
{
    private Paginator $clients;
    public ?string $search = null;
    public string $order = 'name';
    public string $direction = 'ASC';
    protected $listeners = [
        'ClientUpdated' => 'render',
        'ClientDeleted' => 'render',
        'ClientAdded'   => 'render',
        'ProjectAdded'  => 'render',
        'SearchClient'  => 'search',
    ];

    public function mount()
    {
        $this->initClients();
    }

    public function render()
    {
        $counter = Counter::getInstance();
        $clients = $this->initClients();
        $data    = compact('clients', 'counter');

        return view('livewire.clients.table', $data);
    }

    public function initClients()
    {
        return $this->clients ?? Client::orderBy($this->order, $this->direction)
                                       ->where('name', 'LIKE', "%$this->search%")
                                       ->paginate(25);
    }

    public function edit(string $id)
    {
        $this->emit('EditClient', $id);
    }

    public function delete(string $id)
    {
        $this->emit('DeleteClient', $id);
    }

    public function addProject(string $id)
    {
        $this->emit('AddProjectToClient', $id);
    }

    public function search(?string $search = null)
    {
        $this->search  = $search;
    }

    public function order(string $field)
    {
        if ( $field === $this->order ) {
            $this->toggleDirection();
        }
        else {
            $this->order = $field;
        }
    }

    private function toggleDirection()
    {
        $this->direction = $this->direction === 'ASC' ? 'DESC' : 'ASC';
    }
}
