{!! Form::open(['route' => ['clients.update', $client], 'method' => 'patch']) !!}
{{ Form::label('name', 'Nom') }}
{{ Form::text('name', $client->name) }}
{{ Form::submit('Enregistrer') }}
{!! Form::close() !!}

