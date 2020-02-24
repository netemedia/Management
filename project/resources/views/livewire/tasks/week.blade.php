<div class="w-1/4 bg-white rounded shadow mx-4 overflow-hidden">
  <div class="h-4"></div>

  <div class="px-4">
    <div>
      <p class="text-base font-semibold text-gray-800">
        {{ $title }}
      </p>
    </div>
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
      <div class="bg-gradient-{{ $properties->getColor() }} h-full" style="width: {{ $properties->getProgression() }}%; "></div>
    </div>
  </div>
  <div class="flex justify-between bg-gradient-{{ $properties->getColor() }} px-4 py-2">
    <p class="text-sm text-gray-100">Total: {{ $properties->getAll() }}</p>
    @if(100.0 === $properties->getProgression())
      <p class="text-sm text-gray-200">Semaine terminée :)</p>
    @endif
  </div>

</div>
