<?php

namespace App\Http\Livewire\Support\Form;

interface Reinitable
{
    public function reinit(?string $field = null);

    public function reinitAll();
}