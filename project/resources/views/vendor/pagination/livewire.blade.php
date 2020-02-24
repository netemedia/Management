<div class="h-4"></div>
@if ($paginator->hasPages())
  <nav class="flex w-full justify-center">
    <ul class="pagination flex">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span aria-hidden="true">&lsaquo;</span>
        </li>
      @else
        <li class="mx-2">
          <span class="go" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
            &lsaquo;
          </span>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="disabled mx-2" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="active mx-2" aria-current="page"><span>{{ $page }}</span></li>
            @else
              <li class="mx-2">
                <span class="go" wire:click="gotoPage({{ $page }})">{{ $page }}</span>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="mx-2">
          <span class="go" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
            &rsaquo;
          </span>
        </li>
      @else
        <li class="disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span aria-hidden="true">
           &rsaquo;
          </span>
        </li>
      @endif
    </ul>
  </nav>
@endif
