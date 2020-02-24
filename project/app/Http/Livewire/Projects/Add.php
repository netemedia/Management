<?php

namespace App\Http\Livewire\Projects;

use App\Client;
use App\Http\Behaviors\ProjectResourceBehavior;
use App\Http\Forms\ClientForm;
use App\Http\Forms\ResourceForm;
use App\Http\Requests\CreateProjectRequest;
use Illuminate\Support\Arr;
use Livewire\Component;

class Add extends Component
{
    public ?string $name = null;
    public ?string $client_id = null;
    public ?string $lead = null;
    public ?string $manager = null;

    public function mount(?string $client_id = null)
    {
       $this->client_id = $client_id;
    }

    public function render()
    {
        $selectClients   = ClientForm::select();
        $selectResources = ResourceForm::select();

        return view('livewire.projects.add', compact('selectClients', 'selectResources'));
    }

    public function add()
    {
        $rules     = ( new CreateProjectRequest() )->rules();
        $validated = $this->validate($rules);

        $maker     = Arr::only($validated, [ 'name' ]);
        $resources = Arr::only($validated, [ 'lead', 'manager' ]);

        $client = Client::find($validated['client_id']);

        $project = $client->projects()->create($maker);

        $behavior = new ProjectResourceBehavior($project);
        $behavior->assignResources($resources);

        $this->emit('ProjectAdded', $this->client_id);
        $this->reinit();
    }

    public function reinit(?string $field = null)
    {
        if ( empty($field) ) {
            $this->name      = null;
            $this->client_id = null;
            $this->lead      = null;
            $this->manager   = null;
        }
        else {
            $this->$field = null;
        }
    }
}
