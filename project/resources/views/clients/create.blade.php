@extends('app')

@section('title')
  Nouveau Client
@endsection

@section('content')
  @include('clients.components.forms.create')
  @include('components.errors')
@endsection
