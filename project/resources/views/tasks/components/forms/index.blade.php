<div class="w-1/4 bg-white rounded shadow mx-4 px-8">
  <div class="h-8"></div>

  <div class="border-b border-solid border-gray-500 uppercase font-semibold text-gray-800 pb-2">
    Rechercher une tâche
  </div>

  <div class="h-8"></div>

  {!! Form::open(['route' => 'tasks.index', 'method' => 'GET']) !!}
  <fieldset>
    <div class="flex flex-col">
      {{ Form::label('search', 'Recherche :', ['class' => 'mr-2']) }}
      {{ Form::text('search', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
  </fieldset>
  <div class="h-4"></div>
  <div class="flex justify-end">
    {{ Form::submit('Trouver', ['class' => 'px-2 bg-teal-500 text-gray-100 rounded-sm']) }}
  </div>
  {!! Form::close() !!}

  {!! Form::open(['route' => 'tasks.index', 'method' => 'GET']) !!}
  <div class="h-4"></div>
  <div class="flex justify-end">
    {{ Form::submit('Réinitialiser', ['class' => 'px-2 bg-teal-500 text-gray-100 rounded-sm']) }}
  </div>
  {!! Form::close() !!}

  <div class="h-8"></div>

  <div class="border-b border-solid border-gray-500 uppercase font-semibold text-gray-800 pb-2">
    Ajouter une tâche
  </div>

  <div class="h-8"></div>

  {!! Form::open(['route' => 'tasks.store']) !!}
  <fieldset>
    <div class="flex flex-col">
      {{ Form::label('title', 'Titre* :', ['class' => 'mr-2']) }}
      {{ Form::text('title', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('url', 'Lien :', ['class' => 'mr-2']) }}
      {{ Form::text('url', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('estimation', 'Estimation* :', ['class' => 'mr-2']) }}
      {{ Form::text('estimation', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('day', 'Jour :', ['class' => 'mr-2']) }}
      {{ Form::date('day', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('start_hour', 'Heure :', ['class' => 'mr-2']) }}
      {{ Form::text('start_hour', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('project_id', 'Projet* :', ['class' => 'mr-2']) }}
      {{ Form::select('project_id', $selectProjects, null, [
        'placeholder' => 'Choisir un projet',
        'class' => 'border border-solid border-gray-500 rounded-sm px-4'
      ]) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('resource_id', 'Ressource :', ['class' => 'mr-2']) }}
      {{ Form::select('resource_id', $selectResources, null, [
        'placeholder' => '-',
        'class' => 'border border-solid border-gray-500 rounded-sm px-4'
      ]) }}
    </div>
  </fieldset>
  <div class="h-4"></div>
  <div class="flex justify-end">
    {{ Form::submit('Enregistrer', ['class' => 'px-2 bg-teal-500 text-gray-100 rounded-sm']) }}
  </div>
  {!! Form::close() !!}

  <div class="h-8"></div>

  @include('components.errors')
</div>
