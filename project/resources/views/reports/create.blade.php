@extends('app')

@section('title')
    Rapport
@endsection

@section('subtitle')
    Nouveau Rapport
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
                    >
                </div>
                <div class="w-4"></div>
                <div>
                    <label for="fin">Au</label>
                    <input
                        class="input" id="fin" type="date" name="fin" required
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
        </div>

        <div class="px-4">
            <div>
                Travail en cours
            </div>
            <div class="h-4"></div>
            <div class="bg-white" id="doing"></div>
            <div class="h-4"></div>
        </div>

        <div class="px-4">
            <div>
                Travail à prévoir
            </div>
            <div class="h-4"></div>
            <div class="bg-white" id="todo"></div>
            <div class="h-4"></div>
        </div>

        <div class="px-4">
            <div>
                Observations
            </div>
            <div class="h-4"></div>
            <div class="bg-white" id="observations"></div>
        </div>

        <div class="py-4 px-2">
            <input id="submit" class="button" type="submit" value="Enregistrer">
        </div>

    </section>

    <script>
        let todoQuill = new Quill('#todo', {
            theme: 'snow'
        });

        let doingQuill = new Quill('#doing', {
            theme: 'snow'
        });

        let doneQuill = new Quill('#done', {
            theme: 'snow'
        });

        let observationsQuill = new Quill('#observations', {
            theme: 'snow'
        });

        let submit = document.getElementById('submit')

        submit.addEventListener('click', function () {
            let post = {
                todo        : todoQuill.root.innerHTML,
                doing       : doingQuill.root.innerHTML,
                done        : doneQuill.root.innerHTML,
                observations: observationsQuill.root.innerHTML,
                debut       : document.getElementById('debut').value,
                fin         : document.getElementById('fin').value
            }


            let resp = axios.post('/projects/{{ $project->id }}/create/report', post)
            console.log(resp)
        })
    </script>
@endsection
