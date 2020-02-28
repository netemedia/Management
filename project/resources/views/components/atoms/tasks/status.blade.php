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
