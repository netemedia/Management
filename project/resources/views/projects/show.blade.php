@extends('app')

@section('title')
    {{ $project->name }}
@endsection

@section('breadcrumb')
    @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
    <section class="flex -mx-4 items-start flex-col lg:flex-row">
        <div class="bg-white  shadow mx-4 lg:w-3/4">
            @livewire('reports.table', $project->id)
        </div>
    </section>
    <div class="h-8"></div>
    <section class="flex -mx-4 items-start flex-col lg:flex-row">
        <div class="bg-white  shadow mx-4 lg:w-3/4">
            @livewire('tasks.table', $project->id)
        </div>
        <div class="bg-white  shadow my-4 mx-4 lg:my-0 ">
            @livewire('filters.tasks', $project->id)
            @livewire('tasks.add', $project->id)
        </div>
        @livewire('modals.tasks.edit', $project->id)
        @livewire('modals.tasks.delete', $project->id)
    </section>
@endsection

@section('note')
    <div>
        {!! $project->note !!}
    </div>
@endsection
