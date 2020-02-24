<div class="w-3/4 bg-white rounded shadow mx-4">
  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left cursor-pointer" wire:click="order('name')">
        @if('name' !== $order)
          <i class="las la-caret-right"></i>
        @elseif('ASC' === $direction)
          <i class="las la-caret-up"></i>
        @else
          <i class="las la-caret-down"></i>
        @endif
        Nom
      </th>
      <th class="p-4 text-left cursor-pointer" wire:click="order('tasks_count')">
        @if('tasks_count' !== $order)
          <i class="las la-caret-right"></i>
        @elseif('ASC' === $direction)
          <i class="las la-caret-up"></i>
        @else
          <i class="las la-caret-down"></i>
        @endif
        Tickets
      </th>
      <th class="p-4 text-left">
        Client
      </th>
      <th class="p-4 text-left">
        Lead
      </th>
      <th class="p-4 text-left">
        Manager
      </th>
      <th class="p-4 text-left">Actions</th>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
    @foreach($projects as $project)
      <tr>
        <td class="p-4">
          <a class="text-blue-500 no-underline" href="{{ $project->link }}">
            {{ $project->name }}
          </a>
        </td>
        <td class="p-4 text-sm">
          {{ $project->tasks_count }}
          @if($counter->tasks > 0)
            <span class="text-gray-500">
              ({{ round( ($project->tasks_count / $counter->tasks) * 100, 2 )}}%)
            </span>
          @endif
        </td>
        <td class="p-4 text-sm">
          {{ $project->client->name }}
        </td>
        <td class="p-4 text-sm">
          @if($lead = $project->getPosition('lead'))
            {{ $lead->name }}
          @else
            -
          @endif
        </td>
        <td class="p-4 text-sm">
          @if($manager = $project->getPosition('manager'))
            {{ $manager->name }}
          @else
            -
          @endif
        </td>
        <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$project->id}}')">
            <i class="lar la-edit"></i>
          </span>
          <div class="w-4"></div>
          <span class="go" wire:click="addTask('{{$project->id}}')">
            <i class="las la-plus-square"></i>
          </span>
          <div class="w-4"></div>
          <span class="go text-red-500" wire:click="delete('{{$project->id}}')">
            <i class="las la-trash"></i>
          </span>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <div class="h-4"></div>
</div>


