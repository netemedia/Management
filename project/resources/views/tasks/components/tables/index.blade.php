<table class="table-fixed">
  <thead>
  <tr class="text-bold">
    <th class="w-64 text-left px-4 py-2">
      <a class="go" href="?order=title">
        Titre
      </a>
    </th>
    <td class="w-64 text-left px-4 py-2">
      <a class="go" href="?order=project">
        Projet
      </a>
    </td>
    <td class="w-64 text-left px-4 py-2">
      <a class="go" href="?order=resource">
        Ressource
      </a>
    </td>
    <td class="w-16 text-left px-4 py-2">Temps</td>
    <td class="w-48 text-left px-4 py-2">
      <a class="go" href="?order=moment">
        Moment
      </a>
    </td>
    <td class="w-64 text-left px-4 py-2">Actions</td>
  </tr>
  </thead>
  <tbody>
  @foreach($tasks as $k => $task)
    @if($k % 2 === 0)
      <tr class="bg-gray-100 hover:bg-gray-200">
    @else
      <tr class="hover:bg-gray-200">
        @endif
        <td class="border border-black px-4 py-2">
          {{ $task->title }}
        </td>
        <td class="border border-black px-4 py-2">
          <a class="go" href="{{ $task->project->link }}">
            {{ $task->project->name }}
          </a>
        </td>
        <td class="border border-black px-4 py-2">
          @if($resource = $task->resource)
            <a class="go" href="{{ $resource->link }}">
              {{ $resource->name }}
            </a>
          @endif
        </td>
        <td class="border border-black px-4 py-2">
          {{ $task->estimation }}h
        </td>
        <td class="border border-black px-4 py-2">
          {{ $task->moment }}
          @if($task->interval)
            <br>
            {{ $task->interval }}
          @endif
        </td>
        <td class="border border-black px-4 py-2">
          <span class="mr-2">
          <a class="go" target="_blank" href="{{ $task->url }}">
            Trello
          </a>
          </span>
          <span class="mr-2"><a class="go" href="{{ $task->link }}/edit">Modifier</a></span>
          <span>
            {!! Form::open(['route' => ['tasks.destroy', $task], 'method' => 'delete']) !!}
            {{ Form::submit('Supprimer', ['class' => 'cursor-pointer bg-transparent text-red-500']) }}
            {!! Form::close() !!}
          </span>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

