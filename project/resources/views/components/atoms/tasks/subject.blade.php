<a class="text-blue-500 no-underline" href="{{ $task->project->link }}">
  {{ $task->project->name }}
</a>
<br>
@if($task->url)
  <a class="text-blue-500 no-underline" href="{{ $task->url }}" target="_blank">
    {{ $task->title }}
  </a>
@else
  {{ $task->title }}
@endif
