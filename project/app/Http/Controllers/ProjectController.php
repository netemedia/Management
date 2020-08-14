<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Behaviors\ProjectResourceBehavior;
use App\Http\Forms\ClientForm;
use App\Http\Forms\ResourceForm;
use App\Http\Repositories\ProjectRepository;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request, ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->build($request)->paginate(25);

        $selectClients   = ClientForm::select();
        $selectResources = ResourceForm::select();

        return view('projects.index', compact('projects', 'selectClients', 'selectResources'));
    }

    public function create()
    {
        $selectClients   = ClientForm::select();
        $selectResources = ResourceForm::select();

        return view('projects.create', compact('selectClients', 'selectResources'));
    }

    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();

        $maker     = Arr::only($validated, [ 'name' ]);
        $resources = Arr::only($validated, [ 'lead', 'manager' ]);

        $client = Client::find($validated['client_id']);

        $project = $client->projects()->create($maker);

        $behavior = new ProjectResourceBehavior($project);
        $behavior->assignResources($resources);

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $clients       = Client::orderBy('name')->get();
        $selectClients = [];
        foreach ( $clients as $client ) {
            $selectClients[] = [
                $client->id => $client->name,
            ];
        }
        $resources       = Resource::orderBy('first_name')->get();
        $selectResources = [];
        foreach ( $resources as $resource ) {
            $selectResources[] = [
                $resource->id => "$resource->first_name $resource->last_name",
            ];
        }

        return view('projects.edit', compact('project', 'selectClients', 'selectResources'));
    }

    public function update(Project $project, UpdateProjectRequest $request)
    {
        $validated = $request->validated();

        $maker     = Arr::only($validated, [ 'name' ]);
        $resources = Arr::only($validated, [ 'lead', 'manager' ]);

        $client = Client::find($validated['client_id']);

        $project->update($maker);
        $project->client()->associate($client);
        $project->save();

        $behavior = new ProjectResourceBehavior($project);
        $behavior->assignResources($resources);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $today = Carbon::now()->format('Y-m-d');
        $next  = Carbon::now()->addDays(5)->format('Y-m-d');
        $tasks = $project->tasks()->orderBy('day')->whereBetween('day', [ $today, $next ])->paginate(10);

        return view('projects.show', compact('project', 'tasks'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back();
    }
}
