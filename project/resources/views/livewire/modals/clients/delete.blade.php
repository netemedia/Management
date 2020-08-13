<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white -sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-red-500 p-2">
          Euh... t'es sûr(e) de toi là ?
        </header>

        <div class="h-4"></div>

        <div class="p-4">
          <p class="text-center">
            On supprime <span class="text-red-500 text-bold">{{ $name }}</span> ?
          </p>
          <div class="h-4"></div>

          <div class="flex items-center justify-between -mx-2">
        <span class="cursor-pointer text-white px-2 py-1 bg-teal-500 -sm mx-2"
              wire:click="toggle">
          Nah
        </span>
            <span class="cursor-pointer text-white px-2 py-1 bg-red-500 -sm mx-2"
                  wire:click="destroy">
          Oui !
        </span>
          </div>

          <footer>
            @include('components.errors')
          </footer>
        </div>

      </div>
    </div>
  @endif
</div>
