<table class="table">
  <thead class="table-head">
  <tr>
    <th scope="col" class="table-title --order" wire:click="order('name')">
      @include('components/atoms/order', ['order_field' => 'name'])
      Nom
    </th>
    <td class="table-title --order" wire:click="order('tasks_count')">
      @include('components/atoms/order', ['order_field' => 'tasks_count'])
      Tickets
    </td>
    <td class="table-title">Lead</td>
    <td class="table-title">Manager</td>
    <td class="table-title">Actions</td>
  </tr>
  </thead>
  <tbody class="table-body">
  @foreach($projects as $project)
    <tr>
      <td class="p-4">
        <a class="go" href="{{ $project->client->link }}">
          {{ $project->client->name}}
        </a> |
        <a class="go" href="{{ $project->link }}">
          {{ Str::afterLast($project->name, "| ") }}
          @if($project->innovation)<i aria-hidden="true" class="las la-bolt"></i>@endif
        </a>
      </td>
      <td class="p-4 text-sm">
        @include('components/atoms/projects/tasks_count')
      </td>
      <td class="p-4 text-sm">
        @include('components/atoms/projects/resource', ['position' => 'lead'])
      </td>
      <td class="p-4 text-sm">
        @include('components/atoms/projects/resource', ['position' => 'manager'])
      </td>
      <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$project->id}}')">
            <i aria-hidden="true" class="lar la-edit"></i>
          </span>
        <div class="w-4"></div>
        <span class="go" wire:click="addTask('{{$project->id}}')">
            <i aria-hidden="true" class="las la-plus-square"></i>
          </span>
        <div class="w-4"></div>
        <span class="go text-red-500" wire:click="delete('{{$project->id}}')">
            <i aria-hidden="true" class="las la-trash"></i>
          </span>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
