@extends('app')

@section('title')
  Ressources
@endsection

@section('content')
  <h1>Ressources</h1>
  @include('resources.components.tables.index')
  {{ $resources->appends(app('request')->all())->links() }}
  <h2>Ajouter une ressource</h2>
  <div class="h-8"></div>
  @include('resources.components.forms.create')
  @include('components.errors')
@endsection
