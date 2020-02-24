<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Rechercher un ticket
  </div>

  <div class="p-8">
    <div class="flex flex-col">
      <label for="search">
        Recherche :
      </label>
      <div class="flex items-center relative">
        <input id="search" name="search"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown="search"
               wire:model="search">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit">
          <i class="las la-backspace"></i>
        </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="resource_id">
        Responsable :
      </label>
      <select name="resource_id" id="resource_id"
              class="border border-solid border-gray-500 rounded-sm px-4"
              wire:model="resource_id" wire:click="search">
        <option value="">-</option>
        @foreach($selectResources as $i => $n)
          <option value="{{ $i }}">{{ $n }}</option>
        @endforeach
      </select>
    </div>
    <div class="h-4"></div>
    <div class="flex items-center">
      <input type="checkbox" id="done" name="done"
             class="mr-2"
             @if($done)checked="checked"@endif>
      <label class="cursor-pointer" for="done" wire:click="toggleDisplayDoneTasks">
        Afficher les tickets effectués
      </label>
    </div>
  </div>

</div>
