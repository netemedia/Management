<div class="w-3/4 bg-white rounded shadow mx-4">
  <table class="w-full table-auto">
    <thead class="font-semibold text-gray-700">
    <tr>
      <th class="p-4 text-left w-16">État</th>
      <th class="p-4 text-left w-16">Estimation</th>
      <th class="p-4 text-left">Sujet</th>
      <th class="p-4 text-left w-48">Resource</th>
      <th class="p-4 text-left w-48">Date</th>
      <th class="p-4 text-left">Actions</th>
    </tr>
    </thead>
    <tbody class="border-t-2 border-solid border-gray-500">
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
        <td class="p-4 text-sm">{{ $task->moment }}</td>
        <td class="p-4 flex">
          <span class="go" wire:click="edit('{{$task->id}}')">
            <i class="lar la-edit"></i>
          </span>
          <div class="w-4"></div>
          <span class="go text-red-500" wire:click="delete('{{$task->id}}')">
            <i class="las la-trash"></i>
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

  <div class="h-4"></div>
</div>
