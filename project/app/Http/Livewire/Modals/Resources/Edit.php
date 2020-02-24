<?php

namespace App\Http\Livewire\Modals\Resources;

use App\Resource;
use App\Http\Requests\UpdateResourceRequest;
use Livewire\Component;

class Edit extends Component
{
    public bool $opened = false;
    public string $name = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $oldName = '';
    public ?string $resourceId = null;
    protected $listeners = [
        'EditResource' => 'toggle',
    ];

    public function render()
    {
        return view('livewire.modals.resources.edit');
    }

    public function toggle(?string $id = null)
    {
        $this->opened     = ! $this->opened;
        $this->resourceId = $id;
        $resource         = Resource::find($this->resourceId);
        $this->name       = $resource ? $resource->name : '';
        $this->first_name = $resource ? $resource->first_name : '';
        $this->last_name  = $resource ? $resource->last_name : '';
        $this->oldName    = $resource ? $resource->name : '';
    }

    public function update(string $id)
    {
        $resource  = Resource::find($id);
        $rules     = ( new UpdateResourceRequest() )->rules($id);
        $validated = $this->validate($rules);
        $resource->update($validated);
        $this->toggle($id);
        $this->emit('ResourceUpdated');
    }
}
