@if($project->client)
  <a class="go" href="{{ $project->client->link }}">
    {{ $project->client->name }}
  </a>
@else
  -
@endif
