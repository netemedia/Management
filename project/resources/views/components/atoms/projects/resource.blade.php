@if($buddy = $project->getPosition($position))
  <a class="go" href="{{ $buddy->link }}">
    {{ $buddy->name }}
  </a>
@else
  -
@endif
