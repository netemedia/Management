<div>
  <div class="aside-title">
    Ajouter un projet
  </div>

  <div class="p-8">

    <div class="flex flex-col">
      <label for="name">
        Nom* :
      </label>
      <div class="field">
        <input id="name" name="name" type="text" class="input" wire:keydown.enter="create" wire:model="name">
        <span class="reinit" wire:click="reinit('name')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </span>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="client_id">
        Client* :
      </label>
      <div class="field">
        <select name="client_id" id="client_id" class="input --select" wire:model="client_id">
          <option value="">Choisir un client</option>
          @foreach($selectClients as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <div class="reinit --select" wire:click="reinit('client_id')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="lead">
        Lead :
      </label>
      <div class="field">
        <select name="lead" id="lead" class="input --select" wire:model="lead">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <div class="reinit --select" wire:click="reinit('lead')">
          <i aria-hidden="true" class="las la-backspace"></i>
        </div>
      </div>
    </div>

    <div class="h-4"></div>

    <div class="flex flex-col">
      <label for="manager">
        Manager :
      </label>
      <div class="field">
        <select name="manager" id="manager" class="input --select" wire:model="manager">
          <option value="">-</option>
          @foreach($selectResources as $i => $n)
            <option value="{{ $i }}">{{ $n }}</option>
          @endforeach
        </select>
        <div class="reinit --select" wire:click="reinit('manager')">
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
