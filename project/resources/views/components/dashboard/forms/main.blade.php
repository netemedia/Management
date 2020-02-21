{!! Form::open() !!}

{{ Form::label('week', 'Date', ['class' => 'mx-2']) }}
{{ Form::date('week', $week[0], ['class' => 'border-2']) }}

{{ Form::label('resource', 'Ressource', ['class' => 'mx-2']) }}
{{ Form::select('resource', $selectResources, $resource ? $resource->id : null, ['class' => 'border-2']) }}

{{ Form::submit('Rechercher', ['class' => 'px-2']) }}

{!! Form::close() !!}
