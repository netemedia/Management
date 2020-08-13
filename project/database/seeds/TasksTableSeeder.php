<?php

use App\Project;
use App\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = config('data.tasks');
        foreach ( $tasks as $task ) {
            // -- Create tasks through Project
            $project    = Project::where('name', $task['project'])->first();
            $maker      = Arr::only($task, [ 'title', 'url', 'estimation' ]);
            $taskObject = $project->tasks()->create($maker);

            // -- Add Resource
            $resource = Resource::where('first_name', $task['resource'])->first();
            $taskObject->resource()->associate($resource);
            $taskObject->save();
        }
    }
}
