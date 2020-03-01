<?php

namespace App\Http\Livewire\Modals\Resources;

use App\Http\Livewire\ModalComponent;
use App\Http\Livewire\Support\Destroyer;
use App\Resource;

class Delete extends ModalComponent implements Destroyer
{
    public bool $opened = false;
    public string $name = '';
    public ?string $resourceId = null;
    protected $listeners = [
        'DeleteResource' => 'up',
    ];

    public function render()
    {
        return view('livewire.modals.resources.delete');
    }

    public function destroy()
    {
        $resource = Resource::find($this->resourceId);
        $resource->delete();
        $this->emit('ResourceDeleted');
        $this->close();
    }

    public function up(string $id)
    {
        $this->resourceId = $id;
        $resource         = Resource::find($this->resourceId);
        $this->name       = $resource ? $resource->name : '';
        $this->open();
    }
}
