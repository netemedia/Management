<table class="table-fixed">
  <caption class="text-left text-2xl">Projets</caption>
  <thead>
  <tr class="text-bold">
    <th class="w-64 text-left px-4 py-2">Nom</th>
    <td class="w-32 text-left px-4 py-2">Lead</td>
    <td class="w-32 text-left px-4 py-2">Manager</td>
    <td class="w-32 text-left px-4 py-2">Tâches</td>
  </tr>
  </thead>
  <tbody>
  @foreach($projects as $k => $project)
    @if($k % 2 === 0)
      <tr class="bg-gray-100 hover:bg-gray-200">
    @else
      <tr class="hover:bg-gray-200">
        @endif
        <td class="border border-black px-4 py-2">
          <a class="go" href="{{ $project->link }}">
            {{ $project->name }}
          </a>
        </td>
        <td class="border border-black px-4 py-2">
          @if($resource = $project->resources->where('pivot.position', 'lead')->first())
            <a class="go" href="{{ $resource->link }}">
              {{ $resource->first_name }}
            </a>
          @endif
        </td>
        <td class="border border-black px-4 py-2">
          @if($resource = $project->resources->where('pivot.position', 'manager')->first())
            <a class="go" href="{{ $resource->link }}">
              {{ $resource->first_name }}
            </a>
          @endif
        </td>
        <td class="border border-black px-4 py-2">
            {{ $project->tasks_count }}
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
