@extends('app')

@section('title')
  Clients
@endsection

@section('subtitle')
  C'est eux qui nous donnent de super projets
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.clients')
      @livewire('clients.add')
    </div>
    @livewire('clients.table')
    @livewire('modals.clients.edit')
    @livewire('modals.clients.delete')
    @livewire('modals.clients.add-project')
  </section>
@endsection
