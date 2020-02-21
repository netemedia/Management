<div class="w-3/4 bg-white rounded shadow mx-4">
  <div class="h-4"></div>

  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left">Nom</th>
      <td class="p-4 text-left">Client</td>
      <td class="p-4 text-left">Lead</td>
      <td class="p-4 text-left">Manager</td>
      <td class="p-4 text-left">Actions</td>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
    @foreach($projects as $k => $project)
      <tr>
        <td class="p-4">
          <a class="go" href="{{ $project->link }}">
            {{ $project->name }}
          </a>
        </td>
        <td class="p-4 text-sm">
          <a class="go" href="{{ route('clients.show', $project->client) }}">
            {{ $project->client->name }}
          </a>
        </td>
        <td class="p-4 text-sm">
          @if($lead = $project->getPosition('lead'))
            <a class="go" href="{{ $lead->link }}">
              {{ $lead->first_name }}
            </a>
          @endif
        </td>
        <td class="p-4 text-sm">
          @if($manager = $project->getPosition('manager'))
            <a class="go" href="{{ $manager->link }}">
              {{ $manager->first_name }}
            </a>
          @endif
        </td>
        <td class="p-4 text-sm flex">
          <a class="go" href="{{ $project->link }}/edit">Modifier</a>
          <div class="w-4"></div>
          <div>
            {!! Form::open(['route' => ['projects.destroy', $project], 'method' => 'delete']) !!}
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
        {{ $projects->appends(app('request')->all())->links() }}
      </td>
    </tr>
    </tfoot>
  </table>

  <div class="h-4"></div>
</div>

