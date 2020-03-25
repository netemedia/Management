@if($client->percent_complete > 0)
  {{ $client->completed_hours }}h / {{ $client->hours }}h
  @if($client->percent_complete > 99)
    <i aria-hidden="true" class="text-green-500 las la-check-square"></i>
  @else
    <span class="text-gray-500">
      ({{ $client->percent_complete }}%)
    </span>
  @endif
@endif
