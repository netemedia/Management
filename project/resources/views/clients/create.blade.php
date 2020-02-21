@extends('app')

@section('title')
  Nouveau Client
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  @include('clients.components.forms.create')
  @include('components.errors')
@endsection
