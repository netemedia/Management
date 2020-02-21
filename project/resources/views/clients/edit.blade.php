@extends('app')

@section('title')
  {{ $client->name }}
@endsection

@section('content')
  @include('clients.components.forms.edit')
  @include('components.errors')
@endsection
