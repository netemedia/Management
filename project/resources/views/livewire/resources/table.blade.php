<div class="w-3/4 bg-white rounded shadow mx-4">
  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left cursor-pointer" wire:click="order('first_name')">
        @if('first_name' !== $order)
          <i class="las la-caret-right"></i>
        @elseif('ASC' === $direction)
          <i class="las la-caret-up"></i>
        @else
          <i class="las la-caret-down"></i>
        @endif
        Nom
      </th>
      <th class="p-4 text-left cursor-pointer" wire:click="order('projects_count')">
        @if('projects_count' !== $order)
          <i class="las la-caret-right"></i>
        @elseif('ASC' === $direction)
          <i class="las la-caret-up"></i>
        @else
          <i class="las la-caret-down"></i>
        @endif
        Projets
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
      <th class="p-4 text-left">Actions</th>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
    @foreach($resources as $resource)
      <tr>
        <td class="p-4">
          <a class="text-blue-500 no-underline" href="{{ $resource->link }}">
            {{ $resource->name }}
          </a>
        </td>
        <td class="p-4 text-sm">
          {{ $resource->projects_count }}
          @if($counter->projects > 0)
            <span class="text-gray-500">
              ({{ round( ($resource->projects_count / $counter->projects) * 100, 2 ) }}%)
          </span>
          @endif
        </td>
        <td class="p-4 text-sm">
          {{ $resource->tasks_count }}
          @if($counter->tasks > 0)
            <span class="text-gray-500">
              ({{ round( ($resource->tasks_count / $counter->tasks) * 100, 2 )}}%)
            </span>
          @endif
        </td>
        <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$resource->id}}')">
            <i class="lar la-edit"></i>
          </span>
          <div class="w-4"></div>
          <span class="go text-red-500" wire:click="delete('{{$resource->id}}')">
            <i class="las la-trash"></i>
          </span>
        </td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <td colspan="4">
        {{ $resources->appends(app('request')->all())->links() }}
      </td>
    </tr>
    </tfoot>
  </table>

  <div class="h-4"></div>
</div>


