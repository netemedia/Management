<?php

use App\Client;
use App\Resource;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('data.projects');
        foreach ( $projects as $project ) {
            // -- Create project through client.
            $client        = Client::where('name', $project['client'])->first();
            $projectObject = $client->projects()->create([ 'name' => $project['name'] ]);

            // -- Add resources.
            foreach ( $project['resources'] as $item ) {
                $resource = Resource::where('first_name', $item['name'])->first();
                $projectObject->resources()->save($resource);
                $first               = $projectObject->resources()->where('id', $resource->id)->first();
                $assigment           = $first->pivot;
                $assigment->position = $item['position'] ?? null;
                $assigment->save();
            }
        }
    }
}
