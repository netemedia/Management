@extends('app')

@section('title')
  {{ $client->name }}
@endsection

@section('content')
  @include('clients.components.tables.projects')
@endsection

@section('note')
  <div>
    {!! $client->note !!}
  </div>
@endsection
