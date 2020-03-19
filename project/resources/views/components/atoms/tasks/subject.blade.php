<a class="go" href="{{ $task->project->client->link }}">{{ $task->project->client->name }}</a> |
<a class="go" href="{{ $task->project->link }}">
  {{ Str::afterLast($task->project->name, '| ') }}
</a>
<br>
@if($task->url)
  <a class="go" href="{{ $task->url }}" target="_blank">
    {{ $task->title }}
  </a>
@else
  {{ $task->title }}
@endif
