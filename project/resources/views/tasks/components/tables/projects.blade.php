<table>
  <caption>Projets</caption>
  <thead>
  <tr>
    <th>Nom</th>
    <td>Lead</td>
    <td>Manager</td>
  </tr>
  </thead>
  <tbody>
  @foreach($projects as $project)
    <tr>
      <td>
        <a href="{{ $project->link }}">
          {{ $project->name }}
        </a>
      </td>
      <td>
        @if($resource = $project->resources->where('pivot.position', 'lead')->first())
          {{ $resource->first_name }}
        @endif
      </td>
      <td>
        @if($resource = $project->resources->where('pivot.position', 'manager')->first())
          {{ $resource->first_name }}
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
