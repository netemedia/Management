<div class="w-1/3 bg-white rounded shadow mx-4 overflow-hidden relative">
  <div class="h-4"></div>

  <div class="absolute right-0 top-0 pt-2 pr-2">
        <span class="cursor-pointer" wire:click="previousMonth">
          <i class="las la-angle-left"></i>
        </span>
    <span class="cursor-pointer" wire:click="resetMonth">
          <i class="las la-undo-alt"></i>
        </span>
    <span class="cursor-pointer" wire:click="nextMonth">
          <i class="las la-angle-right"></i>
        </span>
  </div>

  <div class="px-4">
    <p class="text-base font-semibold text-gray-800">
      {{ $title }}
    </p>
    <div class="flex justify-end">
      <p class="text-gray-700">
          <span class="text-lg">
            {{ $properties->getDone() }}
          </span>
      </p>
    </div>
  </div>

  <div class="h-4"></div>

  <div>
    <div class="w-full bg-gray-300 h-1 overflow-hidden">
      <div class="bg-gradient-{{ $properties->getColor() }} h-full"
           style="width: {{ $properties->getProgression() }}%; "></div>
    </div>
  </div>
  <div class="flex justify-between bg-gradient-{{ $properties->getColor() }} px-4 py-2">
    <p class="text-sm text-gray-100">Total: {{ $properties->getAll() }}</p>
    @if(100.0 === $properties->getProgression())
      <p class="text-sm text-gray-200">Mois terminé :)</p>
    @endif
  </div>

</div>
