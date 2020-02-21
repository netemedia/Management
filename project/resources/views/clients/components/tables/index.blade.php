<div class="w-3/4 bg-white rounded shadow mx-4">
  <div class="h-4"></div>

  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left">Nom</th>
      <th class="p-4 text-left">Projet</th>
      <th class="p-4 text-left">Ticket</th>
      <th class="p-4 text-left">Actions</th>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
    @foreach($clients as $client)
      <tr>
        <td class="p-4">
          <a class="text-blue-500 no-underline" href="{{ $client->link }}">
            {{ $client->name }}
          </a>
        </td>
        <td class="p-4 text-sm">
          {{ $client->projects_count }}
          <span class="text-gray-500">
            ({{ round( ($client->projects_count / $projects_count) * 100, 2 ) }}%)
          </span>
        </td>
        <td class="p-4 text-sm">
          {{ $client->tasks_count }}
          <span class="text-gray-500">
            ({{ round( ($client->tasks_count / $tasks_count) * 100, 2 )}}%)
          </span>
        </td>
        <td class="p-4 text-sm flex">
          <a class="go" href="{{ $client->link }}/edit">
            Modifier
          </a>
          <div class="w-4"></div>
          <div>
            {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'delete']) !!}
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
        {{ $clients->appends(app('request')->all())->links() }}
      </td>
    </tr>
    </tfoot>
  </table>

  <div class="h-4"></div>
</div>


