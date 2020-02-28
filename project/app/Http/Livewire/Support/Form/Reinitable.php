<?php

namespace App\Http\Livewire\Support\Form;

interface Reinitable
{
    public function reinit(?string $field);

    public function reinitAll();
}