<?php

namespace App\Http\Livewire\Modals\Resources;

use App\Http\Livewire\ModalComponent;
use App\Http\Livewire\Support\Destroyer;
use App\Resource;

class Delete extends ModalComponent implements Destroyer
{
    public ?string $name = null;
    public ?string $resource_id = null;
    protected $listeners = [
        'DeleteResource' => 'up',
    ];

    public function render()
    {
        return view('livewire.modals.resources.delete');
    }

    public function destroy()
    {
        $resource = Resource::find($this->resource_id);
        $resource->delete();
        $this->emit('ResourceDeleted');
        $this->close();
    }

    public function up(string $id)
    {
        $this->resource_id = $id;
        $resource          = Resource::find($this->resource_id);
        $this->name        = $resource ? $resource->name : '';
        $this->open();
    }
}
