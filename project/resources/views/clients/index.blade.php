@extends('app')

@section('title')
  Clients
@endsection

@section('subtitle')
  C'est eux qui nous donnent de super projets
@endsection

@section('breadcrumb')
  <ul class="flex">
    <li>
      <a class="text-gray-600 no-underline" href="/">Dashboard</a>
    </li>
    <li class="mx-2">/</li>
    <li>
      <span class="text-gray-600 no-underline">Lister</span>
    </li>
    <li class="mx-2">/</li>
    <li>
      <span class="text-gray-600 no-underline">Clients</span>
    </li>
  </ul>
@endsection

@section('content')
  <section class="flex -mx-4">
    @include('clients.components.forms.create')
    @include('clients.components.tables.index')
  </section>
@endsection
