<div class="w-full">

  <div class="w-full flex">
    <input class="input py-1" type="date" value="{{ $date }}" wire:model="date">
    <div class="w-4"></div>
    <button class="button" wire:click="changeDate">
      Valider
    </button>
  </div>

  <div class="h-8"></div>

  <div class="flex w-full -mx-4 items-start">
    @foreach($days as $day => $date)
      <div class="w-1/5 mx-4 shadow bg-white rounded-sm">
        <div class="h-2"></div>
        <header class="px-4">
          {{ $day }} {{ Str::afterLast($date, '-') }}
        </header>
        <div class="h-2"></div>
        @php $tasksOfDay = $tasks->where('day', $date) @endphp
        @foreach($tasksOfDay as $task)
          <div class="w-full h-px bg-gray-300"></div>
          <div class="px-4 relative justify-between text-sm @if($task->done) bg-gray-100 @endif">
            <div class="h-2"></div>
            @if($task->estimation)
              <div class="absolute right-0 top-0 mr-2 mt-2">
                {{ $task->estimation }}h
              </div>
            @endif
            <div>
              @include('components/atoms/tasks/resource')
            </div>
            <div>
              @include('components/atoms/tasks/subject')
            </div>
            <div class="h-2"></div>
            @if($task->done)
              <div class="absolute right-0 bottom-0 mr-2 mb-2 text-green-500">
                <i aria-hidden="true" class="text-green-500 las la-check-square"></i> OK
              </div>
            @endif
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>
