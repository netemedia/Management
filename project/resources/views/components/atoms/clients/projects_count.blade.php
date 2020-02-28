{{ $client->projects_count }}
@if($counter->projects > 0)
  <span class="text-gray-500">
              ({{ round( ($client->projects_count / $counter->projects) * 100, 2 ) }}%)
          </span>
@endif
