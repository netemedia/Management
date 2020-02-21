<table class="table-fixed">
  <caption class="text-left text-2xl">Taches à venir</caption>
  <thead>
  <tr class="text-bold">
    <th class="w-64 text-left px-4 py2">Titre</th>
    <td class="w-64 text-left px-4-py-2">Projet</td>
    <td class="w-16 text-left px-4-py-2">Trello</td>
    <td class="w-16 text-left px-4-py-2">Temps</td>
    <td class="w-64 text-left px-4-py-2">Moment</td>
  </tr>
  </thead>
  <tbody>
  @foreach($tasks as $k => $task)
    @php $tr_class = ($k % 2 === 0) ? "bg-gray-100 hover:bg-gray-200" : "hover:bg-gray-200" @endphp
    <tr class="{{ $tr_class }}">
      <td class="px-4 py-2">
        {{ $task->title }}
      </td>

      <td class="px-4 py-2">
        <a class="go" href="{{ $task->project->link }}">
          {{ $task->project->name }}
        </a>
      </td>

      <td class="px-4 py-2">
        <a class="go" target="_blank" href="{{ $task->url }}">Voir</a>
      </td>

      <td class="px-4 py-2">
        {{ $task->estimation }}h
      </td>

      <td class="px-4 py-2">
        {{ $task->moment }}
        @if($task->interval)
          <br>
          {{ $task->interval }}
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>