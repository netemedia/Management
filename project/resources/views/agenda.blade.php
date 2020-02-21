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

  {!! Form::open(['method' => 'GET']) !!}

  {{ Form::label('date', 'Date', ['class' => 'mx-2']) }}
  {{ Form::date('date', $date, ['class' => 'border-2 px-2']) }}

  {{ Form::submit('Enregistrer', ['class' => 'px-2']) }}
  {!! Form::close() !!}

  <div class="h-8"></div>

  <section class="flex -mx-4">
    @comp('App\Http\View\Components\WeekTasks')
    @comp('App\Http\View\Components\DayTasks')
  </section>

  <div class="h-8"></div>

  <section class="flex -mx-4">

    <div class="w-full bg-white rounded shadow mx-4">
      <div class="h-4"></div>

      <div class="px-4">
        <p class="text-base font-semibold text-gray-800">
          {{ Date::date($date) }} | {{ Date::date($next) }}
        </p>
      </div>

      <div class="h-2"></div>

      <table class="w-full table-auto">
        <thead class="font-semibold text-gray-700">
        <th class="p-4 text-left">Statut</th>
        <th class="p-4 text-left">Sujet</th>
        <th class="p-4 text-left">Resource</th>
        <th class="p-4 text-left">Date</th>
        </thead>
        <tbody class="border-t-2 border-solid border-gray-500">
        @foreach($tasks as $task)
          <tr>
            <td class="p-4">
              {{ Form::open(['route' => ['status', $task] ]) }}


              @if($task->done)
                {!! Form::status('Terminé', 'bg-gradient-greens rounded-sm text-white px-2 py-1 text-xs
                cursor-pointer') !!}
              @else
                {!! Form::status('Ouvert', 'bg-gradient-pinks rounded-sm text-white px-2 py-1 text-xs
                cursor-pointer')
                 !!}
              @endif
              {{ Form::close() }}
            </td>
            <td class="p-4 text-sm">
              @if($task->url)
                <a class="text-blue-500 no-underline" href="{{ $task->url }}" target="_blank">
                  {{ $task->title }}
                </a>
              @else
                {{ $task->title }}
              @endif
            </td>
            <td class="p-4 text-sm">{{ $task->resource->first_name }}</td>
            <td class="p-4 text-sm">{{ $task->moment }}</td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <td colspan="4">
            {{ $tasks->appends(app('request')->all())->links() }}
          </td>
        </tr>
        </tfoot>
      </table>

      <div class="h-4"></div>
    </div>


  </section>

@endsection

