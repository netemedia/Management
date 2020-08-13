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
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white  shadow mx-4 lg:w-3/4">
      @livewire('clients.table')
    </div>
    <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.clients')
      @livewire('clients.add')
    </div>
    @livewire('modals.clients.edit')
    @livewire('modals.clients.delete')
    @livewire('modals.clients.add-project')
  </section>
@endsection
