@if($task->resource)
  <a class="go" href="{{ $task->resource->link }}">
    {{ $task->resource->name }}
  </a>
@else
  -
@endif