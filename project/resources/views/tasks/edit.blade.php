@extends('app')

@section('title')
  {{ $task->project->name }}
@endsection

@section('content')
  @include('tasks.components.forms.edit')
  @include('components.errors')
@endsection
