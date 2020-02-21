@extends('app')

@section('title')
  Nouveau Projet
@endsection

@section('content')
  @include('projects.components.forms.create')
  @include('components.errors')
@endsection
