<div>
  @if($opened)
    <div class="modal">
      <div class="modal-bg" wire:click="close"></div>
      <div class="modal-body">
        <header class="modal-header">
          Ajouter un ticket :
          <br>
          <span class="text-bold">{{ $project_name }}</span>
        </header>

        <div class="h-4"></div>

        <div class="p-4">
          <div class="flex flex-col">
            <label for="title">
              Sujet* :
            </label>
            <input type="text" name="title" id="title" class="input" wire:model="title">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="url">
              Url :
            </label>
            <input type="text" name="url" id="url" class="input" wire:model="url">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="estimation">
              Estimation :
            </label>
            <input type="text" name="estimation" id="estimation" class="input" wire:model="estimation">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="day">
              Jour :
            </label>
            <input type="date" name="day" id="day" class="input" wire:model="day">
          </div>

          <div class="h-4"></div>

          <div class="flex flex-col">
            <label for="resource_id">
              Responsable :
            </label>
            <select name="resource_id" id="resource_id" class="input" wire:model="resource_id">
              <option value="">-</option>
              @foreach($selectResources as $i => $n)
                <option value="{{ $i }}">{{ $n }}</option>
              @endforeach
            </select>
          </div>

          <div class="h-8"></div>

          <div class="modal-actions">
            <span class="button" wire:click="close">
              Annuler
            </span>
            <span class="button --ok" wire:click="create('{{ $project_id }}')">
              Ok
            </span>
          </div>

        </div>

        <div class="h-4"></div>

        <footer>
          @include('components.errors')
        </footer>
      </div>
    </div>
  @endif
</div>
