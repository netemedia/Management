<div>
  @if($opened)
    <div class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0">
      <div class="fixed top-0 left-0 right-0 bottom-0 bg-modalbg cursor-pointer" wire:click="toggle">

      </div>
      <div class="relative bg-white rounded-sm shadow-xl overflow-hidden">
        <header class="text-white text-center w-full border-b bg-blue-500 p-2">
          Modifer ticket {{ $old_title }}
        </header>

        <div class="h-2"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="edit_title">
              Sujet* :
            </label>
            <input type="text" name="edit_title" id="edit_title"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="title">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="edit_url">
              Url :
            </label>
            <input type="text" name="edit_url" id="edit_url"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="url">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="edit_estimation">
              Estimation :
            </label>
            <input type="text" name="edit_estimation" id="edit_estimation"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="estimation">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="edit_day">
              Jour :
            </label>
            <input type="date" name="edit_day" id="edit_day"
                   class="border border-solid border-gray-500 rounded-sm px-4"
                   wire:model="day">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="edit_resource_id">
              Responsable :
            </label>
            <select name="edit_resource_id" id="edit_resource_id"
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
                  wire:click="editTask('{{ $task_id }}')">
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
