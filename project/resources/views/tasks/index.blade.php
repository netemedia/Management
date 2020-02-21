@extends('app')

@section('title')
  Tâches
@endsection

@section('content')
  <h1>Tâches</h1>
  @include('tasks.components.tables.index')
  {{ $tasks->appends(app('request')->all())->links() }}
  <h2>Ajouter une tâche</h2>
  <div class="h-8"></div>
  @include('tasks.components.forms.create')
  @include('components.errors')
@endsection
