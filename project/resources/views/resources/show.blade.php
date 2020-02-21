@extends('app')

@section('title')
  {{ $resource->name }}
@endsection

@section('content')
  <h1>{{ $resource->name }}</h1>
  @include('resources.components.tables.tasks')
  {{ $tasks->appends(app('request')->all())->links() }}
@endsection

@section('note')
  <div>
    {!! $resource->note !!}
  </div>
@endsection
