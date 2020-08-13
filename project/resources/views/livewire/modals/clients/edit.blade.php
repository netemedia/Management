<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white -sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-blue-500 p-2">
          Modifier <span class="text-bold">{{ $oldName }}</span>
        </header>

        <div class="h-2"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="edit_name">
              Nom*:
            </label>
            <input type="text" name="edit_name" id="edit_name"
                   class="border border-solid border-gray-500 -sm px-4"
                   wire:keydown.enter="update('{{$clientId}}')"
                   wire:model="name" value="{{ $name }}">
          </div>

          <div class="h-4"></div>

          <div class="flex justify-between -mx-2">
          <span class="cursor-pointer text-white px-2 py-1 bg-teal-500 -sm mx-2"
                wire:click="toggle">
            Annuler
          </span>
          <span class="cursor-pointer text-white px-2 py-1 bg-blue-500 -sm mx-2"
                wire:click="update('{{ $clientId }}')">
            Ok
          </span>
          </div>

        </div>
        <footer>
          @include('components.errors')
        </footer>
      </div>
    </div>
  @endif
</div>
