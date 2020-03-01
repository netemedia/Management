<div>
  <div class="border-b-2 border-solid border-gray-500 uppercase font-semibold text-gray-800 p-4">
    Ajouter un projet
  </div>

  <div class="p-8">
    <div class="flex flex-col">
      <label for="name">
        Nom* :
      </label>
      <div class="flex items-center relative">
        <input id="name" name="name"
               type="text"
               class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
               wire:keydown.enter="add"
               wire:model="name">
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
              wire:click="reinit('name')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="client_id">
        Client* :
      </label>
      <div class="flex items-center relative">
        <select name="client_id" id="client_id"
                class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                wire:model="client_id">
          <option value="">Choisir un client</option>
          @foreach($selectClients as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
              wire:click="reinit('client_id')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="lead">
        Lead :
      </label>
      <div class="flex items-center relative">
        <select name="lead" id="lead"
                class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                wire:model="lead">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
              wire:click="reinit('lead')">
            <i aria-hidden="true" class="las la-backspace"></i>
          </span>
      </div>
    </div>
    <div class="h-4"></div>
    <div class="flex flex-col">
      <label for="manager">
        Manager :
      </label>
      <div class="flex items-center relative">
        <select name="manager" id="manager"
                class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                wire:model="manager">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
              wire:click="reinit('manager')">
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
