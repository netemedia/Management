@extends('app')

@section('title')
  Projets
@endsection

@section('subtitle')
  Bah... là, c'est les projets quoi.
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4">
    @include('projects.components.forms.index')
    @include('projects.components.tables.index')
  </section>
@endsection
