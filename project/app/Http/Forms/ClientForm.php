<?php

namespace App\Http\Forms;

use App\Http\Forms\Interfaces\SelectInterface;
use App\Client;

class ClientForm implements SelectInterface
{
    /**
     * Returns an array for form select clients.
     *
     * @return array
     */
    public static function select() : array
    {
        $clients       = Client::orderBy('name')->get();
        $selectClients = [];
        foreach ( $clients as $client ) {
            $selectClients[ $client->id ] = $client->name;
        }

        return $selectClients;
    }
}