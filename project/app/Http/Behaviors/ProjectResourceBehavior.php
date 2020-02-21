<?php

namespace App\Http\Behaviors;

use App\Project;
use App\Resource;

class ProjectResourceBehavior
{
    /**
     * @var \App\Project
     */
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function assignResources(array $resources)
    {
        /** @var Resource[] $resources */
        foreach ( $resources as $position => $id ) {
            $resource = Resource::findOrFail($id);
            if($already = $this->project->getPosition($position)) {
                $this->unassignResource($already);
            }
            $this->assignResource($resource);
            if ( $assignment = $this->findAssignment($id) ) {
                $assignment->pivot->position = $position;
                $assignment->pivot->save();
            }
        }
    }

    protected function assignResource(Resource $resource) : void
    {
        $this->project->resources()->save($resource);
    }

    protected function unassignResource(Resource $resource) : void
    {
        $this->project->resources()->detach($resource);
    }

    protected function findAssignment(string $id)
    {
        return $this->project->resources()->where('id', $id)->first();
    }
}