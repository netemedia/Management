<table class="table-fixed">
  <thead>
  <tr class="text-bold">
    <th class="w-64 text-left px-4 py-2">Nom</th>
    <td class="w-64 text-left px-4 py-2">Client</td>
    <td class="w-64 text-left px-4 py-2">Lead</td>
    <td class="w-64 text-left px-4 py-2">Manager</td>
    <td class="w-64 text-left px-4 py-2">Actions</td>
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
          <a class="go" href="{{ route('clients.show', $project->client) }}">
            {{ $project->client->name }}
          </a>
        </td>
        <td class="border border-black px-4 py-2">
          @if($lead = $project->getPosition('lead'))
            <a class="go" href="{{ $lead->link }}">
              {{ $lead->first_name }}
            </a>
          @endif
        </td>
        <td class="border border-black px-4 py-2">
          @if($manager = $project->getPosition('manager'))
            <a class="go" href="{{ $manager->link }}">
              {{ $manager->first_name }}
            </a>
          @endif
        </td>
        <td class="border border-black px-4 py-2">
          <span class="mr-2"><a class="go" href="{{ $project->link }}">Voir</a></span>
          <span class="mr-2"><a class="go" href="{{ $project->link }}/edit">Modifier</a></span>
          <span>
            {!! Form::open(['route' => ['projects.destroy', $project], 'method' => 'delete']) !!}
            {{ Form::submit('Supprimer', ['class' => 'cursor-pointer bg-transparent text-red-500']) }}
            {!! Form::close() !!}
          </span>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

