@extends('app')

@section('title')
  {{ $resource->name }}
@endsection

@section('content')
  @include('resources.components.forms.edit')
  @include('components.errors')
@endsection
