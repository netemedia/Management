{!! Form::open(['route' => 'tasks.store']) !!}
<div class="my-4">
  {{ Form::label('title', 'Nom', ['class' => 'mr-2']) }}
  {{ Form::text('title', null, ['class' => 'border-2 w-full']) }}
</div>
<div class="my-4 -mx-2">
  {{ Form::label('url', 'Carte', ['class' => 'mx-2']) }}
  {{ Form::text('url', null, ['class' => 'border-2']) }}

  {{ Form::label('effort', 'Effort', ['class' => 'mx-2']) }}
  {{ Form::select('effort', config('enums.effort'), null, ['placeholder' => '-', 'class' => 'border-2']) }}

  {{ Form::label('estimation', 'Temps', ['class' => 'mx-2']) }}
  {{ Form::selectRange('estimation', 1, 4, null, ['class' => 'border-2']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('days', 'Début', ['class' => 'mx-2']) }}
  {{ Form::date('days', null, ['class' => 'border-2']) }}

  {{ Form::label('start_hour', 'Heure', ['class' => 'mx-2']) }}
  {{ Form::select('start_hour', $hours, null, ['placeholder' => '-', 'class' => 'border-2']) }}

  {{ Form::label('limit_date', 'Deadline', ['class' => 'mx-2']) }}
  {{ Form::date('limit_date', null, ['class' => 'border-2']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('project_id', 'Projet', ['class' => 'mx-2']) }}
  {{ Form::select('project_id', $selectProjects, null, ['placeholder' => 'Choisir un projet', 'class' => 'border-2']) }}

  {{ Form::label('resource_id', 'Ressource', ['class' => 'mx-2']) }}
  {{ Form::select('resource_id', $selectResources, null, ['placeholder' => '-', 'class' => 'border-2']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('task_id', 'Parent', ['class' => 'mx-2']) }}
  {{ Form::select('task_id', $selectTasks, null, ['placeholder' => '-', 'class' => 'border-2']) }}
</div>

{{ Form::submit('Enregistrer', ['class' => 'px-2']) }}

{!! Form::close() !!}
