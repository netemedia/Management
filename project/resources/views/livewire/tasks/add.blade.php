<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Ajouter un ticket
  </div>

  <div class="p-8">
    <div class="flex flex-col">
      <label for="title">
        Sujet* :
      </label>
      <div class="flex items-center relative">
        <input id="title" name="title"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="title">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit('title')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="url">
        Url :
      </label>
      <div class="flex items-center relative">
        <input id="url" name="url"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="url">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit('url')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="estimation">
        Estimation :
      </label>
      <div class="flex items-center relative">
        <input id="estimation" name="estimation"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="estimation">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit('estimation')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="day">
        Jour :
      </label>
      <div class="flex items-center relative">
        <input id="day" name="day"
               type="date"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="day">
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="resource_id">
        Responsable :
      </label>
      <div class="flex items-center relative">
        <select name="resource_id" id="resource_id"
                class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                wire:model="resource_id">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
              wire:click="reinit('resource_id')">
            <i aria-hidden="true" class="las la-backspace"></i>
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
