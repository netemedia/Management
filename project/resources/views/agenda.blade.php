@extends('app')

@section('head')
@endsection

@section('title')
  Agenda
@endsection

@section('subtitle')
  Comment on s'organise
@endsection

@section('breadcrumb')
  @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
  <section class="flex -mx-4">
    @livewire('agenda')
  </section>
@endsection

