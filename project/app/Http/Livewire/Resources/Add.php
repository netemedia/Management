<?php

namespace App\Http\Livewire\Resources;

use App\Http\Livewire\CreatorComponent;
use App\Http\Livewire\Support\Form\Reinitable;
use App\Http\Requests\CreateResourceRequest;
use App\Resource;

class Add extends CreatorComponent implements Reinitable
{
    public ?string $first_name = null;
    public ?string $last_name = null;

    public function render()
    {
        return view('livewire.resources.add');
    }

    public function reinit(?string $field = null)
    {
        if ( empty($field) ) {
            $this->reinitAll();
        }
        else {
            $this->$field = null;
        }
    }

    public function reinitAll()
    {
        $this->last_name  = null;
        $this->first_name = null;
    }

    public function create()
    {
        $rules     = ( new CreateResourceRequest() )->rules();
        $validated = $this->validate($rules);
        Resource::create($validated);

        $this->emit('ResourceAdded');
        $this->reinit();
    }
}
