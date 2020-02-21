@extends('app')

@section('title')
  Nouvelle ressource
@endsection

@section('content')
  <h1>Ajouter une ressource</h1>
  @include('resources.components.forms.create')
  @include('components.errors')
@endsection
