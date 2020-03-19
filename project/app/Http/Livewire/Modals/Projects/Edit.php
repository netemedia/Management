<?php

namespace App\Http\Livewire\Modals\Projects;

use App\Http\Behaviors\ProjectResourceBehavior;
use App\Http\Forms\ResourceForm;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use Illuminate\Support\Arr;
use Livewire\Component;

class Edit extends Component
{
    public bool $opened = false;
    public string $name = '';
    public string $client_id = '';
    public ?string $lead = null;
    public ?string $manager = null;
    public bool $innovation = false;
    public string $oldName = '';
    public ?string $oldLead = null;
    public ?string $oldManager = null;
    public bool $oldInnovation = false;
    public ?string $projectId = null;
    protected $listeners = [
        'EditProject' => 'toggle',
    ];

    public function render()
    {
        $selectResources = ResourceForm::select();

        return view('livewire.modals.projects.edit', compact('selectResources'));
    }

    public function toggle(?string $id = null)
    {
        $this->opened = ! $this->opened;
        $this->projectId = $id;
        $project = Project::find($this->projectId);
        $this->name = $project ? $project->name : '';
        $this->lead = $project ? $project->lead : '';
        $this->manager = $project ? $project->manager : '';
        $this->innovation = $project ? $project->innovation : false;
        $this->oldName = $project ? $project->name : '';
        $this->oldLead = $project ? $project->lead : '';
        $this->oldManager = $project ? $project->manager : '';
        $this->oldInnovation = $project ? $project->innovation : false;
    }

    public function update(string $id)
    {
        $project = Project::find($id);
        $rules = ( new UpdateProjectRequest() )->rules();
        $validated = $this->validate($rules);
        $resources = Arr::only($validated, [ 'lead', 'manager' ]);
        $project->update(Arr::only($validated, [ 'name', 'innovation' ]));

        $behavior = new ProjectResourceBehavior($project);
        $behavior->assignResources($resources);

        $this->toggle($id);
        $this->emit('ProjectUpdated');
    }
}
