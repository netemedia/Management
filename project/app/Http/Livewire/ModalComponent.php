<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Support\Modal;
use Livewire\Component;

abstract class ModalComponent extends Component implements Modal
{
    public bool $opened = false;

    public function open()
    {
        $this->opened = true;
    }

    public function close()
    {
        $this->opened = false;
    }

    public function toggle()
    {
        $this->opened = ! $this->opened;
    }
}
