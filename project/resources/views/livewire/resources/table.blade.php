<table class="w-full table-auto">
  <thead class="font-semibold text-gray-700">
  <tr>
    <td class="p-4 w-64 text-left cursor-pointer" wire:click="order('first_name')">
      @if('first_name' !== $order)
        <i aria-hidden="true" class="las la-caret-right"></i>
      @elseif('ASC' === $direction)
        <i aria-hidden="true" class="las la-caret-up"></i>
      @else
        <i aria-hidden="true" class="las la-caret-down"></i>
      @endif
      Nom
    </td>
    <td class="p-4 text-left cursor-pointer hidden md:table-cell" wire:click="order('projects_count')">
      @if('projects_count' !== $order)
        <i aria-hidden="true" class="las la-caret-right"></i>
      @elseif('ASC' === $direction)
        <i aria-hidden="true" class="las la-caret-up"></i>
      @else
        <i aria-hidden="true" class="las la-caret-down"></i>
      @endif
      Projets
    </td>
    <td class="p-4 text-left cursor-pointer hidden md:table-cell" wire:click="order('tasks_count')">
      @if('tasks_count' !== $order)
        <i aria-hidden="true" class="las la-caret-right"></i>
      @elseif('ASC' === $direction)
        <i aria-hidden="true" class="las la-caret-up"></i>
      @else
        <i aria-hidden="true" class="las la-caret-down"></i>
      @endif
      Tickets
    </td>
    <td class="p-4 text-left">Actions</td>
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
            <i aria-hidden="true" class="lar la-edit"></i>
          </span>
        <div class="w-4"></div>
        <span class="go text-red-500" wire:click="delete('{{$resource->id}}')">
            <i aria-hidden="true" class="las la-trash"></i>
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


