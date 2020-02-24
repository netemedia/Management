<?php

namespace App\Http\Livewire\Modals\Resources;

use App\Resource;
use Livewire\Component;

class Delete extends Component
{
    public bool $opened = false;
    public string $name = '';
    public ?string $resourceId = null;
    protected $listeners = [
        'DeleteResource' => 'toggle',
    ];

    public function render()
    {
        return view('livewire.modals.resources.delete');
    }

    public function toggle(?string $id = null)
    {
        $this->opened     = ! $this->opened;
        $this->resourceId = $id;
        $resource         = Resource::find($this->resourceId);
        $this->name       = $resource ? $resource->name : '';
    }

    public function delete()
    {
        $resource = Resource::find($this->resourceId);
        $resource->delete();
        $this->emit('ResourceDeleted');
        $this->toggle();
    }
}
