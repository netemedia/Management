@if($task->resource)
  <a class="text-blue-500 no-underline" href="{{ $task->resource->link }}">
    {{ $task->resource->name }}
  </a>
@else
  -
@endif