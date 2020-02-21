@extends('app')

@section('title')
  Projets
@endsection

@section('content')
  <h1>Projets</h1>
  @include('projects.components.tables.index')
  {{ $projects->appends(app('request')->all())->links() }}
  <h2>Ajouter un projet</h2>
  <div class="h-8"></div>
  @include('projects.components.forms.create')
  @include('components.errors')
@endsection
