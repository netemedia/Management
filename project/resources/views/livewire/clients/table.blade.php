<table class="table">
  <thead class="table-head">
  <tr>
    <th scope="col" class="table-title --order w-64" wire:click="order('name')">
      @include('components/atoms/order', ['order_field' => 'name'])
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
  @foreach($clients as $client)
    <tr>
      <td class="p-4">
        <a class="text-blue-500 no-underline" href="{{ $client->link }}">
          {{ $client->name }}
        </a>
      </td>
      <td class="p-4 text-sm hidden md:table-cell">
        @include('components/atoms/clients/projects_count')
      </td>
      <td class="p-4 text-sm hidden md:table-cell">
        @include('components/atoms/clients/tasks_count')
      </td>
      <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$client->id}}')">
            <i aria-hidden="true" class="lar la-edit"></i>
          </span>
        <div class="w-4"></div>
        <span class="go" wire:click="addProject('{{$client->id}}')">
            <i aria-hidden="true" class="las la-plus-square"></i>
          </span>
        <div class="w-4"></div>
        <span class="go text-red-500" wire:click="delete('{{$client->id}}')">
            <i aria-hidden="true" class="las la-trash"></i>
          </span>
      </td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
  <tr>
    <td colspan="4">
      {{ $clients->appends(app('request')->all())->links() }}
    </td>
  </tr>
  </tfoot>
</table>


