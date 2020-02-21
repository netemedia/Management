<div class="w-1/4 bg-white rounded shadow mx-4 px-8">
  <div class="h-8"></div>

  <div class="border-b border-solid border-gray-500 uppercase font-semibold text-gray-800 pb-2">
    Rechercher un projet
  </div>

  <div class="h-8"></div>

  {!! Form::open(['route' => 'projects.index', 'method' => 'GET']) !!}
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

  {!! Form::open(['route' => 'projects.index', 'method' => 'GET']) !!}
  <div class="h-4"></div>
  <div class="flex justify-end">
    {{ Form::submit('Réinitialiser', ['class' => 'px-2 bg-teal-500 text-gray-100 rounded-sm']) }}
  </div>
  {!! Form::close() !!}

  <div class="h-8"></div>

  <div class="border-b border-solid border-gray-500 uppercase font-semibold text-gray-800 pb-2">
    Ajouter un projet
  </div>

  <div class="h-8"></div>

  {!! Form::open(['route' => 'projects.store']) !!}
  <fieldset>
    <div class="flex flex-col">
      {{ Form::label('name', 'Nom* :', ['class' => 'mr-2']) }}
      {{ Form::text('name', null, ['class' => 'border border-solid border-gray-500 rounded-sm px-4']) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('client_id', 'Client* :', ['class' => 'mr-2']) }}
      {{ Form::select('client_id', $selectClients, null, [
        'placeholder' => 'Choisir un client',
        'class' => 'border border-solid border-gray-500 rounded-sm px-4'
      ]) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('lead', 'Lead :', ['class' => 'mr-2']) }}
      {{ Form::select('lead', $selectResources, null, [
        'placeholder' => '-',
        'class' => 'border border-solid border-gray-500 rounded-sm px-4'
      ]) }}
    </div>
    <div class="flex flex-col">
      {{ Form::label('manager', 'Manager :', ['class' => 'mr-2']) }}
      {{ Form::select('manager', $selectResources, null, [
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
