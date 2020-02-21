<?php

namespace App\Http\Controllers;

use App\Http\Forms\ClientForm;
use App\Http\Forms\ResourceForm;
use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::orderBy('first_name')->paginate(25);

        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(CreateResourceRequest $request)
    {
        $validated = $request->validated();
        Resource::create($validated);

        return redirect()->route('resources.index');
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Resource $resource, UpdateResourceRequest $request)
    {
        $validated = $request->validated();
        $resource->update($validated);

        return redirect()->route('resources.index');
    }

    public function show(Resource $resource)
    {
        $today = Carbon::now()->format('Y-m-d');
        $next  = Carbon::now()->addDays(5)->format('Y-m-d');
        $tasks = $resource->tasks()->orderBy('start_date')->whereBetween('start_date', [ $today, $next ])->paginate(10);

        return view('resources.show', compact('resource', 'tasks'));
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->back();
    }
}
