<table class="table">
  <thead class="table-head">
  <tr>
    <td class="table-title lg:w-16">État</td>
    <td class="table-title lg:w-16">~</td>
    <th scope="col" class="table-title">Sujet</th>
    <td class="table-title lg:w-48">Resource</td>
    <td class="table-title lg:w-48">Date</td>
    <td class="table-title">Actions</td>
  </tr>
  </thead>
  <tbody class="table-body">
  @foreach($tasks as $task)
    <tr>
      <td class="p-4">
        @include('components/atoms/tasks/status')
      </td>
      <td class="p-4 text-sm">@if($task->estimation) {{ $task->estimation }}h @else - @endif</td>
      <td class="p-4 text-sm">
        @include('components/atoms/tasks/subject')
      </td>
      <td class="p-4 text-sm">
        @include('components/atoms/tasks/resource')
      </td>
      <td class="p-4 text-sm">
        @include('components/atoms/tasks/day')
      </td>
      <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$task->id}}')">
            <i aria-hidden="true" class="lar la-edit"></i>
          </span>
        <div class="w-4"></div>
        <span class="go text-red-500" wire:click="delete('{{$task->id}}')">
            <i aria-hidden="true" class="las la-trash"></i>
          </span>
      </td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
  <tr>
    <td colspan="4">
      {{ $tasks->links() }}
    </td>
  </tr>
  </tfoot>
</table>
