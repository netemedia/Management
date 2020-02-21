{!! Form::open(['route' => 'projects.store']) !!}

{{ Form::label('name', 'Nom', ['class' => 'mr-2']) }}
{{ Form::text('name', null, ['class' => 'border-2']) }}

{{ Form::label('client_id', 'Client', ['class' => 'mr-2']) }}
{{ Form::select('client_id', $selectClients, null, ['placeholder' => 'Choisir un client', 'class' => 'border-2']) }}

{{ Form::label('lead', 'Lead', ['class' => 'mr-2']) }}
{{ Form::select('lead', $selectResources, null, ['placeholder' => '-', 'class' => 'border-2']) }}

{{ Form::label('manager', 'Manager', ['class' => 'mr-2']) }}
{{ Form::select('manager', $selectResources, null, ['placeholder' => '-', 'class' => 'border-2']) }}

{{ Form::submit('Enregistrer', ['class' => 'px-2']) }}
{!! Form::close() !!}
