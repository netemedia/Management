<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\RepositoryInterface;
use App\Project;
use Illuminate\Http\Request;

class ProjectRepository implements RepositoryInterface
{
    public function build(Request $request)
    {
        $projects = Project::orderBy('name');

        $client = $request->query('client');
        $search = $request->query('search');

        if ( $client ) {
            $projects = $projects->where('client_id', $client);
        }

        if ( $search ) {
            $projects = $projects->where('name', 'LIKE', "%$search%");
        }

        return $projects;
    }
}