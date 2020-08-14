@extends('app')

@section('title')
    Rapport
@endsection

@section('subtitle')
    Rapport {{ $report->period }}
@endsection

@section('breadcrumb')
    @comp('App\Http\View\Components\Breadcrumb')
@endsection

@section('content')
    <section class="flex -mx-4 items-start flex-col lg:flex-row">
        <div>
            Projet :
            <a class="go" href="{{ route('projects.show', $report->project) }}">
                {{ $report->project->name }}
            </a>
        </div>
    </section>
    <div class="h-8"></div>
    <section class="flex -mx-8 items-start flex-col lg:flex-row">
        <div class="w-1/3 px-4">
            <div>
                Travail livré
            </div>
            <div class="h-4"></div>
            <div class="bg-white p-4">
                {!! $report->done !!}
            </div>
        </div>

        <div class="w-1/3 px-4">
            <div>
                Travail en cours
            </div>
            <div class="h-4"></div>
            <div class="bg-white p-4">
                {!! $report->doing !!}
            </div>
        </div>

        <div class="w-1/3 px-4">
            <div>
                Travail à prévoir
            </div>
            <div class="h-4"></div>
            <div class="bg-white p-4">
                {!! $report->todo !!}
            </div>
        </div>

    </section>

    <div class="h-8"></div>

    <section class="flex -mx-8 items-start flex-col lg:flex-row">
        <div class="w-1/3 px-4">
            <div>
                Tickets
            </div>
            <div>
                @foreach($tasks as $task)
                    <div class="bg-white my-4 p-4 border-solid
                        @if($task->done)border-l-4 border-green-500
                        @endif">
                        <div>
                            {{ $task->title }}
                        </div>
                        <div>
                            {{ $task->resource->name }} | {{ $task->moment }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-2/3 px-4">
            <div>
                Observations
            </div>
            <div class="h-4"></div>
            <div class="bg-white p-4">
                {!! $report->observations !!}
            </div>
        </div>
    </section>

    <div class="h-8"></div>

    <section class="flex justify-end">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded no-underline" href="{{ route('reports.edit', $report) }}">
            <i class="las la-pen"></i> Modifier
        </a>

        <form method="post" action="{{ route('reports.destroy', $report) }}">
            @method('delete')
            @csrf
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-4 rounded" type="submit" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce rapport ?');"><i class="las la-trash-alt"></i> Supprimer</button>
        </form>
    </section>
@endsection
