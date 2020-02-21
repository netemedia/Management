<?php

namespace App\Http\Forms;

use App\Http\Forms\Interfaces\SelectInterface;
use App\Task;

class TaskForm implements SelectInterface
{
    /**
     * Returns an array for form select tasks.
     *
     * @return array
     */
    public static function select() : array
    {
        $tasks       = Task::orderBy('title')->get();
        $selectTasks = [];
        foreach ( $tasks as $task ) {
            $selectTasks[ $task->id ] = $task->title;
        }

        return $selectTasks;
    }
}