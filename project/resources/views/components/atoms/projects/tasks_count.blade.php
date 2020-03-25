@if($project->percent_complete > 0)
  {{ $project->completed_hours }}h / {{ $project->hours }}h
  @if($project->percent_complete > 99)
    <i aria-hidden="true" class="text-green-500 las la-check-square"></i>
  @else
    <span class="text-gray-500">
      ({{ $project->percent_complete }}%)
    </span>
  @endif
@endif
