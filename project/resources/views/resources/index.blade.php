@extends('app')

@section('title')
  Ressources
@endsection

@section('subtitle')
  Ça, c'est les gens font des merveilles chez Netemedia
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.resources')
      @livewire('resources.add')
    </div>
    @livewire('resources.table')
    @livewire('modals.resources.edit')
    @livewire('modals.resources.delete')
  </section>
@endsection
