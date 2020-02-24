<?php

namespace App\Http\Livewire\Projects;

use App\Client;
use App\Http\Livewire\Support\Counter;
use App\Project;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;

class Table extends Component
{
    private Paginator $projects;
    public ?string $search = null;
    public string $order = 'name';
    public string $direction = 'ASC';
    public ?string $client_id = null;
    protected $listeners = [
        'ProjectUpdated' => 'render',
        'ProjectDeleted' => 'render',
        'ProjectAdded'   => 'render',
        'SearchProject'  => 'search',
        'TaskAdded'      => 'render',
    ];

    public function mount(?string $client_id = null)
    {
        $this->client_id = $client_id;
        $this->initProjects();
    }

    public function render()
    {
        $counter  = Counter::getInstance();
        $projects = $this->initProjects();

        $data = compact('projects', 'counter');

        return view('livewire.projects.table', $data);
    }

    private function initProjects()
    {
        if ( empty($this->client_id) ) {
            return $this->projects ?? Project::orderBy($this->order, $this->direction)
                                             ->where('name', 'LIKE', "%$this->search%")
                                             ->paginate(25);
        }

        $client = Client::find($this->client_id);

        return $this->projects ?? $client->projects()
                      ->orderBy($this->order, $this->direction)
                      ->where('name', 'LIKE', "%$this->search%")
                      ->paginate(25);
    }

    public function edit(string $id, ?string $client_id = null)
    {
        $this->emit('EditProject', $id);
    }

    public function delete(string $id, ?string $client_id = null)
    {
        $this->emit('DeleteProject', $id, $this->client_id);
    }

    public function search(?string $search = null, ?string $client_id = null)
    {
        $this->search = $search;
        $this->client_id = $client_id;
    }

    public function addTask(string $id, ?string $client_id = null)
    {
        $this->emit('AddTaskToProject', $id, $this->client_id);
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
