<?php

use App\Resource;
use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = config('data.resources');
        foreach($resources as $resource) {
            Resource::create($resource);
        }
    }
}
