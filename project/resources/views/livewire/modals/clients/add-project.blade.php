<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white rounded-sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-blue-500 p-2">
          Ajouter un projet à <span class="text-bold">{{ $clientName }}</span>
        </header>

        <div class="h-2"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="projectName">
              Nom* :
            </label>
            <input type="text" name="projectName" id="projectName"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="name" placeholder="Tartampion">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="lead">
              Lead :
            </label>
            <select name="lead" id="lead"
                    class="border border-solid border-gray-500 rounded-sm px-4"
                    wire:model="lead">
              <option value="">-</option>
              @foreach($selectResources as $i => $n)
                <option value="{{ $i }}">{{ $n }}</option>
              @endforeach
            </select>
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="manager">
              Manager :
            </label>
            <select name="manager" id="manager"
                    class="border border-solid border-gray-500 rounded-sm px-4"
                    wire:model="manager">
              <option value="">-</option>
              @foreach($selectResources as $i => $n)
                <option value="{{ $i }}">{{ $n }}</option>
              @endforeach
            </select>
          </div>

          <input type="hidden" wire:model="client_id" value="{{ $clientId }}">

          <div class="h-4"></div>

          <div class="flex justify-between -mx-2">
          <span class="cursor-pointer text-white px-2 py-1 bg-teal-500 rounded-sm mx-2"
                wire:click="toggle">
            Annuler
          </span>
            <span class="cursor-pointer text-white px-2 py-1 bg-blue-500 rounded-sm mx-2"
                  wire:click="create('{{ $clientId }}')">
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
