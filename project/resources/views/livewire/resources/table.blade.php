<table class="table">
  <thead class="table-head">
  <tr>
    <th scope="col" class="table-title --order w-64" wire:click="order('first_name')">
      @include('components/atoms/order', ['order_field' => 'first_name'])
      Nom
    </th>
    <td class="table-title --order hidden md:table-cell" wire:click="order('projects_count')">
      @include('components/atoms/order', ['order_field' => 'projects_count'])
      Projets
    </td>
    <td class="table-title --order hidden md:table-cell" wire:click="order('tasks_count')">
      @include('components/atoms/order', ['order_field' => 'tasks_count'])
      Tickets
    </td>
    <td class="table-title">Actions</td>
  </tr>
  </thead>
  <tbody class="table-body">
  @foreach($resources as $resource)
    <tr>
      <td class="p-4">
        <a class="go" href="{{ $resource->link }}">
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


