<div class="w-3/4 bg-white rounded shadow mx-4">
  <div class="h-4"></div>

  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left">Titre</th>
      <td class="p-4 text-left">Ressource</td>
      <td class="p-4 text-left">Temps</td>
      <td class="p-4 text-left">Moment</td>
      <td class="p-4 text-left">Actions</td>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
    @foreach($tasks as $k => $task)
      <tr>
        <td class="p-4 text-sm">
          {{ $task->project->client->name }} | {{ $task->project->name }}
          <br>
          {{ $task->title }}
        </td>
        <td class="p-4 text-sm">
          @if($resource = $task->resource)
            <a class="go" href="{{ $resource->link }}">
              {{ $resource->name }}
            </a>
          @endif
        </td>
        <td class="p-4 text-sm">
          {{ $task->estimation }}h
        </td>
        <td class="p-4 text-sm">
          {{ $task->moment }}
          @if($task->interval)
            <br>
            {{ $task->interval }}
          @endif
        </td>
        <td class="p-4 text-sm">
          <a class="go" target="_blank" href="{{ $task->url }}">Trello</a>
          <a class="go" href="{{ $task->link }}/edit">Modifier</a>
          <div>
            {!! Form::open(['route' => ['tasks.destroy', $task], 'method' => 'delete']) !!}
            {{ Form::submit('Supprimer', ['class' => 'cursor-pointer bg-transparent text-red-500']) }}
            {!! Form::close() !!}
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <td colspan="4">
        {{ $tasks->appends(app('request')->all())->links() }}
      </td>
    </tr>
    </tfoot>
  </table>
</div>
