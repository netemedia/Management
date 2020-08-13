@extends('app')

@section('title')
  Ressources
@endsection

@section('subtitle')
  Ça, c'est les gens qui font des merveilles chez Netemedia
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start flex-col lg:flex-row">
    <div class="bg-white  shadow mx-4 lg:w-3/4">
      @livewire('resources.table')
    </div>
    <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
      @livewire('filters.resources')
      @livewire('resources.add')
    </div>
    @livewire('modals.resources.edit')
    @livewire('modals.resources.delete')
  </section>
@endsection
