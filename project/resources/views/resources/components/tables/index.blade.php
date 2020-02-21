<table class="table-fixed">
  <thead>
  <tr class="text-bold">
    <th class="w-64 text-left px-4 py-2">Nom</th>
    <td class="w-32 text-left px-4 py-2">Projets</td>
    <td class="w-32 text-left px-4 py-2">Tâches</td>
    <td class="w-32 text-left px-4 py-2">Heures</td>
    <td class="w-64 text-left px-4 py-2">Actions</td>
  </tr>
  </thead>
  <tbody>
  @foreach($resources as $k => $item)
    @if($k % 2 === 0)
      <tr class="bg-gray-100 hover:bg-gray-200">
    @else
      <tr class="hover:bg-gray-200">
        @endif
        <td class="border border-black px-4 py-2">
          <a class="go" href="{{ $item->link }}">
            {{ $item->name }}
          </a>
        </td>
        <td class="border border-black px-4 py-2">
          {{ $item->projects_count }}
        </td>
        <td class="border border-black px-4 py-2">
          {{ $item->completed_tasks_count }} / {{ $item->tasks_count }}
        </td>
        <td class="border border-black px-4 py-2">
          {{ $item->completed_tasks_total_hours }}h / {{ $item->tasks_total_hours }}h
        </td>
        <td class="border border-black px-4 py-2 flex">
          <span class="mr-2"><a class="go" href="{{ $item->link }}">Voir</a></span>
          <span class="mr-2"><a class="go" href="{{ $item->link }}/edit">Modifier</a></span>
          <span>
            {!! Form::open(['route' => ['resources.destroy', $item], 'method' => 'delete']) !!}
            {{ Form::submit('Supprimer', ['class' => 'cursor-pointer bg-transparent text-red-500']) }}
            {!! Form::close() !!}
          </span>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
