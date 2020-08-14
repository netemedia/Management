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
            <a class="go" href="{{ route('projects.show', $project) }}">
                {{ $project->name }}
            </a>
        </div>
    </section>
    <div class="h-8"></div>

    <form id="form-report" method="post" action="{{ route('reports.update') }}">

        @csrf

        <section class="flex -mx-8 items-start flex-col lg:flex-row">
            <div class="px-4">
                <div>
                    Période
                </div>
                <div class="flex">
                    <div>
                        <label for="debut">Du</label>
                        <input
                                class="input"
                                id="debut"
                                type="date"
                                name="debut"
                                required
                                value="{{ $report->debut }}"
                        >
                    </div>
                    <div class="w-4"></div>
                    <div>
                        <label for="fin">Au</label>
                        <input
                                class="input" id="fin" type="date" name="fin" required
                                value="{{ $report->fin }}"
                        >
                    </div>
                </div>
            </div>
        </section>
        <div class="h-8"></div>
        <section class="-mx-8">
            <div class="px-4">
                <div>
                    Travail livré
                </div>
                <div class="h-4"></div>
                <div class="bg-white" id="done"></div>
                <div class="h-4"></div>
                <input type="hidden" id="input_done" name="done">
            </div>

            <div class="px-4">
                <div>
                    Travail en cours
                </div>
                <div class="h-4"></div>
                <div class="bg-white" id="doing"></div>
                <div class="h-4"></div>
                <input type="hidden" id="input_doing" name="doing">
            </div>

            <div class="px-4">
                <div>
                    Travail à prévoir
                </div>
                <div class="h-4"></div>
                <div class="bg-white" id="todo"></div>
                <div class="h-4"></div>
                <input type="hidden" id="input_todo" name="todo">
            </div>

            <div class="px-4">
                <div>
                    Observations
                </div>
                <div class="h-4"></div>
                <div class="bg-white" id="observations"></div>
                <input type="hidden" id="input_observations" name="observations">
            </div>

            <div class="py-4 px-2">
                <input id="submit" class="button" type="submit" value="Enregistrer">
            </div>

        </section>
    </form>

    <script>
        let todoQuill = new Quill('#todo', {
            theme: 'snow'
        });
        todoQuill.setText('{{ $report->todo }}');

        let doingQuill = new Quill('#doing', {
            theme: 'snow'
        });

        let doneQuill = new Quill('#done', {
            theme: 'snow'
        });

        let observationsQuill = new Quill('#observations', {
            theme: 'snow'
        });

        let form = document.getElementById('form-report');

        form.addEventListener('submit', function() {
            let post = {
                todo        : todoQuill.root.innerHTML,
                doing       : doingQuill.root.innerHTML,
                done        : doneQuill.root.innerHTML,
                observations: observationsQuill.root.innerHTML
            };

            // Copy HTML content in hidden form
            document.getElementById('input_done').value = post.done;
            document.getElementById('input_doing').value = post.doing;
            document.getElementById('input_todo').value = post.todo;
            document.getElementById('input_observations').value = post.observations;

            return true;
        });
    </script>
@endsection
