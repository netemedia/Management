<div>
  <div class="aside-title">
    Ajouter une ressource
  </div>

  <div class="p-8">

    <div class="flex flex-col">
      <label for="first_name">
        Prénom* :
      </label>
      <div class="field">
        <input id="first_name" first_name="first_name" type="text" class="input"
               wire:keydown.enter="create"
               wire:model="first_name">
        <div class="reinit" wire:click="reinit('first_name')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="last_name">
        Nom* :
      </label>
      <div class="field">
        <input id="last_name" last_name="last_name" type="text" class="input"
               wire:keydown.enter="create"
               wire:model="last_name">
        <div class="reinit" wire:click="reinit('last_name')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex justify-end">
      <span class="button --ok" wire:click="create">
        Ajouter
      </span>
    </div>
  </div>
  @include('components.errors')
</div>
