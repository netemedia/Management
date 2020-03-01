@if($task->done)
  <span wire:click="changeStatus('{{ $task->id }}')" class="status --check">
    <i aria-hidden="true" class="las la-check"></i>
  </span>
@else
  <span wire:click="changeStatus('{{ $task->id }}')" class="status">
    <i aria-hidden="true" class="las la-asterisk"></i>
  </span>
@endif
