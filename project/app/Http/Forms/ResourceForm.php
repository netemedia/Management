<?php

namespace App\Http\Forms;

use App\Http\Forms\Interfaces\SelectInterface;
use App\Resource;

class ResourceForm implements SelectInterface
{
    public static function select() : array
    {
        $resources       = Resource::orderBy('first_name')->get();
        $selectResources = [];
        foreach ( $resources as $resource ) {
            $selectResources[ $resource->id ] = "$resource->first_name $resource->last_name";
        }

        return $selectResources;
    }
}