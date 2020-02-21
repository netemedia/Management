{!! Form::open(['route' => ['resources.update', $resource], 'method' => 'patch']) !!}
{{ Form::label('first_name', 'Prénom') }}
{{ Form::text('first_name', $resource->first_name) }}

{{ Form::label('last_name', 'Nom') }}
{{ Form::text('last_name', $resource->last_name) }}

{{ Form::submit('Enregistrer') }}
{!! Form::close() !!}

