@extends('app')

@section('title')
  Nouvelle tâche
@endsection

@section('content')
  @include('tasks.components.forms.create')
  @include('components.errors')
@endsection
