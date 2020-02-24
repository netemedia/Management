<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Ajouter une ressource
  </div>

  <div class="p-8">
      <div class="flex flex-col">
        <label for="first_name">
          Prénom* :
        </label>
        <div class="flex items-center relative">
          <input id="first_name" first_name="first_name"
                 type="text"
                 class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
                 wire:keydown.enter="add"
                 wire:model="first_name">
          <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
                wire:click="reinit('first_name')">
            <i class="las la-backspace"></i>
          </span>
        </div>
      </div>
    <div class="flex flex-col">
      <label for="last_name">
        Nom* :
      </label>
      <div class="flex items-center relative">
        <input id="last_name" last_name="last_name"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="last_name">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit('last_name')">
            <i class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex justify-end">
      <span class="px-2 bg-blue-500 text-gray-100 rounded-sm cursor-pointer"
            wire:click="add">
        Ajouter
      </span>
    </div>
  </div>
  @include('components.errors')
</div>
