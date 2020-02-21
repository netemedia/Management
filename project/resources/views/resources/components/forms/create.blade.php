{!! Form::open(['route' => 'resources.store']) !!}

{{ Form::label('first_name', 'Prénom', ['class' => 'mr-2']) }}
{{ Form::text('first_name', null, ['class' => 'border-2']) }}

{{ Form::label('last_name', 'Nom', ['class' => 'mr-2']) }}
{{ Form::text('last_name', null, ['class' => 'border-2']) }}

{{ Form::submit('Enregistrer', ['class' => 'px-2']) }}

{!! Form::close() !!}
