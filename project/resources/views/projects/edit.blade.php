@extends('app')

@section('title')
  {{ $project->name }}
@endsection

@section('content')
  @include('projects.components.forms.edit')
  @include('components.errors')
@endsection
