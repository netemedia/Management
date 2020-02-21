{!! Form::open(['route' => ['projects.update', $project], 'method' => 'patch']) !!}

{{ Form::label('name', 'Nom') }}
{{ Form::text('name', $project->name) }}

{{ Form::label('client_id', 'Client') }}
{{ Form::select('client_id', $selectClients, $project->client->id, ['placeholder' => 'Choisir un client']) }}

{{ Form::label('lead', 'Lead') }}
@if($lead = $project->getPosition('lead'))
  {{ Form::select('lead', $selectResources, $lead->id, ['placeholder' => '-']) }}
@else
  {{ Form::select('lead', $selectResources, null, ['placeholder' => '-']) }}
@endif

{{ Form::label('manager', 'Manager') }}
@if($manager = $project->getPosition('manager'))
  {{ Form::select('manager', $selectResources, $manager->id, ['placeholder' => '-']) }}
@else
  {{ Form::select('manager', $selectResources, null, ['placeholder' => '-']) }}
@endif

{{ Form::submit('Enregistrer') }}
{!! Form::close() !!}
