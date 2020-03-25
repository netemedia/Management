@if($resource->percent_complete > 0)
  {{ $resource->completed_hours }}h / {{ $resource->hours }}h
  @if($resource->percent_complete > 99)
    <i aria-hidden="true" class="text-green-500 las la-check-square"></i>
  @else
    <span class="text-gray-500">
      ({{ $resource->percent_complete }}%)
    </span>
  @endif
@endif
