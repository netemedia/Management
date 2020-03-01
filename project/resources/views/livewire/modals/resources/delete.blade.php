<div>
  @if($opened)
    <div class="modal">
      <div class="modal-bg" wire:click="close"></div>
      <div class="modal-body">
        @include('components/molecules/modals/modal-header-danger')

        <div class="h-4"></div>

        <div class="p-4">
          <p class="text-center">
            On supprime <span class="text-red-500 text-bold">{{ $name }}</span> ?
          </p>
          <div class="h-4"></div>

          <div class="modal-actions">
            <span class="button" wire:click="close">
              Nah
            </span>
            <span class="button --danger" wire:click="destroy">
              Oui !
            </span>
          </div>

          <footer>
            @include('components.errors')
          </footer>
        </div>

      </div>
    </div>
  @endif
</div>
