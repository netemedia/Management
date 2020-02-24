<?php

namespace App\Http\Controllers;

use App\Http\Forms\ProjectForm;
use App\Http\Forms\ResourceForm;
use App\Http\Forms\TaskForm;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\LinkInterface;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $order     = $request->query('order', false);
        $direction = $request->query('direction');
        $projects  = $request->query('projects');
        $resources = $request->query('resources');

        $tasks = Task::orderBy('day', 'DESC')->paginate(10);

        $selectProjects  = ProjectForm::select();
        $selectResources = ResourceForm::select();
        $selectTasks     = TaskForm::select();

        return view('tasks.index', compact('tasks', 'selectProjects', 'selectResources'));
    }

    public function create()
    {
        $selectProjects  = ProjectForm::select();
        $selectResources = ResourceForm::select();
        $selectTasks     = TaskForm::select();

        return view('tasks.create', compact('selectProjects', 'selectResources', 'selectTasks'));
    }

    public function store(CreateTaskRequest $request)
    {
        $validated = $request->validated();
        Task::create($validated);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $selectProjects  = ProjectForm::select();
        $selectResources = ResourceForm::select();
        $selectTasks     = TaskForm::select();

        return view('tasks.edit', compact('task', 'selectProjects', 'selectResources', 'selectTasks'));
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $validated = $request->validated();
        $task->update($validated);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
