<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::orderBy('name');
        if ( $search ) {
            $clients = $clients->where('name', 'LIKE', "%{$search}%");
        }
        $clients = $clients->paginate(25);

        $projects_count = Project::count();
        $tasks_count    = Task::count();

        return view('clients.index', compact('clients', 'projects_count', 'tasks_count'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(CreateClientRequest $request)
    {
        $validated = $request->validated();
        Client::create($validated);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client, UpdateClientRequest $request)
    {
        $validated = $request->validated();
        $client->update($validated);

        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        $projects = $client->projects;

        return view('clients.show', compact('client', 'projects'));
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->back();
    }
}
