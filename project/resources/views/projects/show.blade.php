@extends('app')

@section('title')
  {{ $project->name }}
@endsection

@section('content')
  <h1>{{ $project->client->name }} | {{ $project->name }}</h1>
  @include('projects.components.tables.tasks')
  {{ $tasks->appends(app('request')->all())->links() }}
@endsection

@section('note')
  <div>
    {!! $project->note !!}
  </div>
@endsection
