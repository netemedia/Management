<section class="flex -mx-4">

  <div class="w-full bg-white rounded shadow mx-4">
    <div class="h-4"></div>

    <div class="px-4 flex justify-between">
      <p class="text-base font-semibold text-gray-800">
        {{ $title }}
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

    <table class="w-full table-auto">
      <thead class="font-semibold text-gray-700">
      <tr>
        <th class="p-4 text-left w-16">État</th>
        <th class="p-4 text-left w-16">Estimation</th>
        <th class="p-4 text-left">Sujet</th>
        <th class="p-4 text-left w-48">Resource</th>
        <th class="p-4 text-left w-48">Date</th>
      </tr>
      </thead>
      <tbody class="border-t-2 border-solid border-gray-500">
      @foreach($tasks as $task)
        <tr>
          <td class="p-4">
            @if($task->done)
              <span wire:click="changeStatus('{{ $task->id }}')"
                    class="bg-gradient-greens rounded-sm text-white px-2 py-1 text-xs cursor-pointer">
                <i class="las la-check"></i>
              </span>
            @else
              <span wire:click="changeStatus('{{ $task->id }}')"
                    class="bg-gradient-reds rounded-sm text-white px-2 py-1 text-xs cursor-pointer">
                <i class="las la-asterisk"></i>
              </span>
            @endif
          </td>
          <td class="p-4 text-sm">@if($task->estimation) {{ $task->estimation }}h @else - @endif</td>
          <td class="p-4 text-sm">
            {{ $task->project->client->name }} | {{ $task->project->name }}
            <br>
            @if($task->url)
              <a class="text-blue-500 no-underline" href="{{ $task->url }}" target="_blank">
                {{ $task->title }}
              </a>
            @else
              {{ $task->title }}
            @endif
          </td>
          <td class="p-4 text-sm">@if($task->resource) {{ $task->resource->name }} @else - @endif</td>
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
