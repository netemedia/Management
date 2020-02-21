@extends('app')

@section('title')
  {{ $client->name }}
@endsection

@section('content')
  <h1>{{$client->name}}</h1>
  @include('clients.components.tables.projects')
@endsection

@section('note')
  <div>
    {!! $client->note !!}
  </div>
@endsection
