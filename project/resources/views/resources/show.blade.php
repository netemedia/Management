@extends('app')

@section('title')
  {{ $resource->name }}
@endsection

@section('content')
  <section class="flex -mx-4 items-start">
    <div class="w-1/4 bg-white rounded shadow mx-4">
      @livewire('filters.resources.tasks', $resource->id)
    </div>
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
