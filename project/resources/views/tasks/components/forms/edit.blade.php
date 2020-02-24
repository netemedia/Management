{!! Form::open(['route' => ['tasks.update', $task], 'method' => 'patch']) !!}

<div class="my-4">
  {{ Form::label('title', 'Nom', ['class' => 'mr-2']) }}
  {{ Form::text('title', $task->title, ['class' => 'border-2 w-full']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('url', 'Carte', ['class' => 'mx-2']) }}
  {{ Form::text('url', $task->url, ['class' => 'border-2']) }}

  {{ Form::label('effort', 'Effort', ['class' => 'mx-2']) }}
  {{ Form::select('effort', config('enums.effort'), $task->effort, ['placeholder' => '-', 'class' => 'border-2']) }}

  {{ Form::label('estimation', 'Temps', ['class' => 'mx-2']) }}
  {{ Form::selectRange('estimation', 1, 4, $task->estimation, ['class' => 'border-2']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('day', 'Début', ['class' => 'mx-2']) }}
  {{ Form::date('day', $task->day, ['class' => 'border-2']) }}

  {{ Form::label('start_hour', 'Heure', ['class' => 'mx-2']) }}
  {{ Form::select('start_hour', $hours, $task->start_hour, ['placeholder' => '-', 'class' => 'border-2']) }}

  {{ Form::label('limit_date', 'Deadline', ['class' => 'mx-2']) }}
  {{ Form::date('limit_date', $task->limit_date, ['class' => 'border-2']) }}
</div>

<div class="my-4 -mx-2">
  {{ Form::label('project_id', 'Projet', ['class' => 'mx-2']) }}
  {{ Form::select('project_id', $selectProjects, $task->project->id, ['placeholder' => 'Choisir un projet', 'class' => 'border-2']) }}

  {{ Form::label('resource_id', 'Ressource', ['class' => 'mx-2']) }}
  @if($resource = $task->resource)
    {{ Form::select('resource_id', $selectResources, $resource->id, ['placeholder' => '-', 'class' => 'border-2']) }}
  @else
    {{ Form::select('resource_id', $selectResources, null, ['placeholder' => '-', 'class' => 'border-2']) }}
  @endif
</div>

<div class="my-4 -mx-2">
  {{ Form::label('task_id', 'Parent', ['class' => 'mx-2']) }}
  @if($parent = $task->parent)
    {{ Form::select('task_id', $selectTasks, $parent->id, ['placeholder' => '-', 'class' => 'border-2']) }}
  @else
    {{ Form::select('task_id', $selectTasks, null, ['placeholder' => '-', 'class' => 'border-2']) }}
  @endif

</div>

{{ Form::submit('Enregistrer', ['class' => 'px-2']) }}

{!! Form::close() !!}
