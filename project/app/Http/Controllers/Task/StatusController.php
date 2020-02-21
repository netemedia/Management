<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;

class StatusController extends Controller
{
    /**
     * Met à jour le statut de la tâche.
     *
     * @param \App\Task $task
     */
    public function __invoke(Task $task)
    {
        $task->done = ! $task->done;
        $task->save();

        return redirect()->back();
    }
}
