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
  <section class="flex -mx-4">
    @include('clients.components.forms.index')
    @include('clients.components.tables.index')
  </section>
@endsection
