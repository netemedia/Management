<?php

namespace App\Http\Livewire\Support;

use App\Project;
use App\Task;

final class Counter
{
    public int $tasks;
    public int $projects;
    private static $instance = null;

    private function __construct()
    {
        $this->tasks    = Task::count();
        $this->projects = Project::count();
    }

    public static function getInstance() : Counter
    {
        if ( self::$instance == null ) {
            self::$instance = new Counter();
        }

        return self::$instance;
    }
}