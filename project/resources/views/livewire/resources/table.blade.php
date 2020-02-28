<table class="w-full table-auto">
  <thead class="font-semibold text-gray-700">
  <tr>
    <th class="p-4 w-64 text-left cursor-pointer" wire:click="order('first_name')">
      @if('first_name' !== $order)
        <i class="las la-caret-right"></i>
      @elseif('ASC' === $direction)
        <i class="las la-caret-up"></i>
      @else
        <i class="las la-caret-down"></i>
      @endif
      Nom
    </th>
    <th class="p-4 text-left cursor-pointer hidden md:table-cell" wire:click="order('projects_count')">
      @if('projects_count' !== $order)
        <i class="las la-caret-right"></i>
      @elseif('ASC' === $direction)
        <i class="las la-caret-up"></i>
      @else
        <i class="las la-caret-down"></i>
      @endif
      Projets
    </th>
    <th class="p-4 text-left cursor-pointer hidden md:table-cell" wire:click="order('tasks_count')">
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
      <td class="p-4 text-sm hidden md:table-cell">
        @include('components/atoms/resources/projects_count')
      </td>
      <td class="p-4 text-sm hidden md:table-cell">
        @include('components/atoms/resources/tasks_count')
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


