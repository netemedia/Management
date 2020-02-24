<?php

namespace App\Http\Livewire\Resources;

use App\Http\Livewire\Support\Counter;
use App\Resource;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;

class Table extends Component
{
    private Paginator $resources;
    public ?string $search = null;
    public string $order = 'first_name';
    public string $direction = 'ASC';
    protected $listeners = [
        'ResourceUpdated' => 'render',
        'ResourceDeleted' => 'render',
        'ResourceAdded'   => 'render',
        'SearchResource'  => 'search',
    ];

    public function mount()
    {
        $this->initResources();
    }

    public function render()
    {
        $counter = Counter::getInstance();
        $resources = $this->initResources();

        $data = compact('resources', 'counter');

        return view('livewire.resources.table', $data);
    }

    public function initResources()
    {
        return $this->resources ?? Resource::orderBy($this->order, $this->direction)
                                           ->where('first_name', 'LIKE', "%$this->search%")
                                           ->orWhere('last_name', 'LIKE', "%$this->search%")
                                           ->paginate(25);
    }

    public function edit(string $id)
    {
        $this->emit('EditResource', $id);
    }

    public function delete(string $id)
    {
        $this->emit('DeleteResource', $id);
    }

    public function search(?string $search = null)
    {
        $this->search = $search;
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
