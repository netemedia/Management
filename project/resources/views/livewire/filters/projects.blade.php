<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Rechercher un projet
  </div>

  <div class="p-8">
    <div class="flex flex-col">
      <label for="search">
        Recherche :
      </label>
      <div class="flex items-center relative">
        <input id="search" name="search"
               type="text"
               class="border border-solid border-gray-500 -sm px-4 flex-1 h-8"
               wire:keydown="search"
               wire:model="search">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit">
          <i aria-hidden="true" class="las la-backspace"></i>
        </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex items-center">
      <input type="checkbox" id="innovations" name="innovations"
             class="mr-2"
             @if($innovations)checked="checked"@endif>
      <label class="cursor-pointer" for="innovations" wire:click="toggleDisplayInnovations">
        Afficher les innovations <i aria-hidden="true" class="las la-bolt"></i>
      </label>
    </div>
  </div>

</div>
