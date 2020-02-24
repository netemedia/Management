@extends('app')

@section('title')
  {{ $resource->name }}
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    @livewire('resources.tasks', $resource->id)
    @livewire('modals.tasks.edit')
    @livewire('modals.tasks.delete')
  </section>
@endsection

@section('note')
  <div>
    {!! $resource->note !!}
  </div>
@endsection
