{{ $client->tasks_count }}
@if($counter->tasks > 0)
  <span class="text-gray-500">
              ({{ round( ($client->tasks_count / $counter->tasks) * 100, 2 )}}%)
            </span>
@endif
