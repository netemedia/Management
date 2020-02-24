<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white rounded-sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-blue-500 p-2">
          Ajouter un ticket à <span class="text-bold">{{ $project_name }}</span>
        </header>

        <div class="h-2"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="title">
              Sujet* :
            </label>
            <input type="text" name="title" id="title"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="title" placeholder="Tartampion">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="url">
              Url :
            </label>
            <input type="text" name="url" id="url"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="url" placeholder="Tartampion">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="estimation">
              Estimation :
            </label>
            <input type="text" name="estimation" id="estimation"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="estimation" placeholder="Tartampion">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="day">
              Jour :
            </label>
            <input type="date" name="day" id="day"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="day" placeholder="Tartampion">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="resource_id">
              Responsable :
            </label>
            <select name="resource_id" id="resource_id"
                    class="border border-solid border-gray-500 rounded-sm px-4"
                    wire:model="resource_id">
              <option value="">-</option>
              @foreach($selectResources as $i => $n)
                <option value="{{ $i }}">{{ $n }}</option>
              @endforeach
            </select>
          </div>

          <div class="h-4"></div>

          <div class="flex justify-between -mx-2">
          <span class="cursor-pointer text-white px-2 py-1 bg-teal-500 rounded-sm mx-2"
                wire:click="toggle">
            Annuler
          </span>
            <span class="cursor-pointer text-white px-2 py-1 bg-blue-500 rounded-sm mx-2"
                  wire:click="addTask('{{ $project_id }}')">
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
