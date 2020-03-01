<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Ajouter un client
  </div>

  <div class="p-8">
    <fieldset>
      <div class="flex flex-col">
        <label for="name">
          Nom* :
        </label>
        <div class="flex items-center relative">
          <input id="name" name="name"
                 type="text"
                 class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
                 wire:keydown.enter="create"
                 wire:model="name">
          <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
                wire:click="reinit">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
        </div>
      </div>
    </fieldset>
    <div class="h-4"></div>
    <div class="flex justify-end">
      <span class="px-2 bg-blue-500 text-gray-100 rounded-sm cursor-pointer"
            wire:click="create">
        Ajouter
      </span>
    </div>
  </div>
  @include('components.errors')
</div>
