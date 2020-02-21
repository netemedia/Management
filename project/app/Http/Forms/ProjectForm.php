<?php

namespace App\Http\Forms;

use App\Http\Forms\Interfaces\SelectInterface;
use App\Project;

class ProjectForm implements SelectInterface
{
    /**
     * Returns an array for form select projects.
     *
     * @return array
     */
    public static function select() : array
    {
        $projects       = Project::orderBy('name')->get();
        $selectProjects = [];
        foreach ( $projects as $project ) {
            $selectProjects[ $project->id ] = "{$project->client->name} | $project->name";
        }

        return $selectProjects;
    }
}