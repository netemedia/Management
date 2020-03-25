<section class="flex -mx-4">

  <div class="w-full bg-white rounded shadow mx-4">
    <div class="h-4"></div>

    <div class="px-4 flex justify-between">
      <p class="text-base font-semibold text-gray-800">
        {{ $title }} | {{ $hours }} heures
      </p>
      <div class="text-sm">
        <input type="checkbox" id="done" name="done"
               @if($displayDoneTasks)checked="checked"@endif>
        <label class="cursor-pointer" for="done" wire:click="toggleDisplayDoneTasks">
          Afficher les tâches effectuées
        </label>
      </div>
    </div>

    <div class="h-2"></div>

    <table class="table">
      <thead class="table-head">
      <tr>
        <td class="table-title w-16">État</td>
        <td class="table-title w-16">Estimation</td>
        <th scope="col" class="table-title">Sujet</th>
        <td class="table-title w-48">Resource</td>
        <td class="table-title w-48">Date</td>
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
          <td class="p-4 text-sm">{{ $task->moment }}</td>
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

</section>
