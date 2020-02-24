<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white rounded-sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-blue-500 p-2">
          Modifier <span class="text-bold">{{ $oldName }}</span>
        </header>

        <div class="h-2"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="edit_name">
              Nom* :
            </label>
            <div class="flex items-center relative">
              <input id="edit_name" name="edit_name"
                     type="text"
                     class="border border-solid border-gray-500 rounded-sm px-4 flex-1 h-8"
                     wire:keydown.enter="add"
                     wire:model="name">
              <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-2"
                    wire:click="reinit('name')">
                <i class="las la-backspace"></i>
              </span>
            </div>
          </div>

          <div class="h-4"></div>
          <div class="flex flex-col">
            <label for="edit_lead">
              Lead :
            </label>
            <div class="flex items-center relative">
              <select name="edit_lead" id="edit_lead"
                      class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                      wire:model="lead">
                <option value="">-</option>
                @foreach($selectResources as $i => $n)
                  <option @if($oldLead === $i) selected="selected" @endif value="{{ $i }}">{{ $n }}</option>
                @endforeach
              </select>
              <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
                    wire:click="reinit('lead')">
            <i class="las la-backspace"></i>
          </span>
            </div>
          </div>
          <div class="h-4"></div>
          <div class="flex flex-col">
            <label for="edit_manager">
              Manager :
            </label>
            <div class="flex items-center relative">
              <select name="edit_manager" id="edit_manager"
                      class="border border-solid border-gray-500 rounded-sm px-4 w-full"
                      wire:model="manager">
                <option value="">-</option>
                @foreach($selectResources as $i => $n)
                  <option @if($oldManager === $i) selected="selected" @endif value="{{ $i }}">{{ $n }}</option>
                @endforeach
              </select>
              <span class="text-teal-500 text-gray-100 cursor-pointer absolute right-0 mr-6"
                    wire:click="reinit('manager')">
            <i class="las la-backspace"></i>
          </span>
            </div>
          </div>
          <div class="h-4"></div>

          <div class="flex justify-between -mx-2">
          <span class="cursor-pointer text-white px-2 py-1 bg-teal-500 rounded-sm mx-2"
                wire:click="toggle">
            Annuler
          </span>
            <span class="cursor-pointer text-white px-2 py-1 bg-blue-500 rounded-sm mx-2"
                  wire:click="update('{{ $projectId }}')">
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
