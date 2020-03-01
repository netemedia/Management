<?php

namespace App\Http\Livewire\Support;

interface Modal
{
    public function up(string $id);

    public function open();

    public function close();

    public function toggle();
}