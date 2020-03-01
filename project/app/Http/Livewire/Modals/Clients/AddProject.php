<?php

namespace App\Http\Livewire\Modals\Clients;

use App\Client;
use App\Http\Behaviors\ProjectResourceBehavior;
use App\Http\Forms\ResourceForm;
use App\Http\Requests\AddProjectToClientRequest;
use Illuminate\Support\Arr;
use Livewire\Component;

class AddProject extends Component
{
    public bool $opened = false;
    public string $clientName = '';
    public ?string $clientId = null;
    public string $name = '';
    public ?string $lead = null;
    public ?string $manager = null;
    protected $listeners = [
        'AddProjectToClient' => 'toggle',
    ];

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.modals.clients.add-project', compact('selectResources'));
    }

    public function toggle(?string $id = null)
    {
        $this->opened     = ! $this->opened;
        $this->clientId   = $id;
        $client           = Client::find($this->clientId);
        $this->clientName = $client ? $client->name : '';
    }

    public function create(string $id)
    {
        $rules     = ( new AddProjectToClientRequest() )->rules();
        $validated = $this->validate($rules);

        $maker     = Arr::only($validated, [ 'name' ]);
        $resources = Arr::only($validated, [ 'lead', 'manager' ]);

        $client = Client::find($id);

        $project = $client->projects()->create($maker);

        $behavior = new ProjectResourceBehavior($project);
        $behavior->assignResources($resources);

        $this->toggle($id);
        $this->emit('ProjectAdded');
    }
}
