<?php

namespace App\Http\Livewire\Resources;

use App\Http\Requests\CreateResourceRequest;
use App\Resource;
use Livewire\Component;

class Add extends Component
{
    public ?string $first_name = null;
    public ?string $last_name = null;

    public function render()
    {
        return view('livewire.resources.add');
    }

    public function add()
    {
        $rules     = ( new CreateResourceRequest() )->rules();
        $validated = $this->validate($rules);
        Resource::create($validated);

        $this->emit('ResourceAdded');
        $this->reinit();
    }

    public function reinit(?string $field = null)
    {
        if ( empty($field) ) {
            $this->last_name  = null;
            $this->first_name = null;
        }
        else {
            $this->$field = null;
        }
    }
}
