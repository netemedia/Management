<?php

namespace App\Http\Livewire\Properties;

class TasksProperty
{
    private int $done;
    private int $all;

    public function __construct(int $done, int $all)
    {
        $this->done = $done;
        $this->all  = $all;
    }

    public function getProgression() : float
    {
        if ( empty($this->all) ) {
            return 100;
        }

        return 100 * $this->done / $this->all;
    }

    public function getDone() : int
    {
        return $this->done;
    }

    public function getAll() : int
    {
        return $this->all;
    }

    public function getColor() : string
    {
        $progression = $this->getProgression();

        $colors = [
            'reds',
            'oranges',
            'yellows',
            'greens',
            'teals'
        ];

        return $colors[(int) floor($progression / 25)];
    }
}