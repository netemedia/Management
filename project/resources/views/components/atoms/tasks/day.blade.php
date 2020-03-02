<div class="flex">
  @if($task->day)
    <div class="go mr-2" wire:click="eraseDay('{{ $task->id }}')">
      <i aria-hidden="true" class="las la-times"></i>
    </div>
  @endif
  {{ $task->moment }}
</div>
