<div>
  <div class="aside-title">
    Ajouter un ticket
  </div>

  <div class="p-8">

    <div class="flex flex-col">
      <label for="title">
        Sujet* :
      </label>
      <div class="field">
        <input id="title" name="title" type="text" class="input"
               wire:keydown.enter="create"
               wire:model="title">
        <div class="reinit" wire:click="reinit('title')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="url">
        Url :
      </label>
      <div class="field">
        <input id="url" name="url" type="text" class="input"
               wire:keydown.enter="create"
               wire:model="url">
        <div class="reinit" wire:click="reinit('url')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="estimation">
        Estimation :
      </label>
      <div class="field">
        <input id="estimation" name="estimation" type="text" class="input"
               wire:keydown.enter="create"
               wire:model="estimation">
        <div class="reinit" wire:click="reinit('estimation')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="day">
        Jour :
      </label>
      <div class="field">
        <input id="day" name="day" type="date" class="input"
               wire:keydown.enter="create"
               wire:model="day">
        <div class="reinit" wire:click="reinit('day')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="resource_id">
        Responsable :
      </label>
      <div class="field">
        <select name="resource_id" id="resource_id" class="input --select" wire:model="resource_id">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <div class="reinit --select" wire:click="reinit('resource_id')">
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
