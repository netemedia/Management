@php
  $percent = $data()['all'] ? 100 * $data()['done'] / $data()['all'] : 100;
    $color = 'reds';
    if($percent > 25) {
      $color = 'oranges';
    }
    if($percent > 50) {
      $color = 'yellows';
    }
    if($percent > 75) {
      $color = 'greens';
    }
@endphp

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
            {{ $data()['done'] }}
          </span>
      </p>
    </div>
  </div>

  <div class="h-4"></div>

  <div>
    <div class="w-full bg-gray-300 h-1 overflow-hidden">
      <div class="bg-gradient-{{ $color }} h-full" style="width: {{ $percent }}%;"></div>
    </div>
  </div>
  <div class="bg-gradient-{{ $color }} px-4 py-2">
    <p class="text-sm text-gray-100">Total: {{ $data()['all'] }}</p>
  </div>

</div>