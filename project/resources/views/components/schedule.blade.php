<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
  <div class="cd-schedule__timeline">
    <ul>
      @foreach($hours as $hour)
        <li><span>{{ $hour }}</span></li>
      @endforeach
    </ul>
  </div> <!-- .cd-schedule__timeline -->

  <div class="cd-schedule__events">
    <ul>
      <li class="cd-schedule__group">
        <div class="cd-schedule__top-info"><span>Lundi {{ $week[0]->format('d/m/Y') }}</span></div>

        <ul>
          @foreach($resource->tasks->where('start_date', $week[0]->format('Y-m-d')) as $task)
            @if(isset($hours[$task->start_hour]) && isset($hours[$task->start_hour + $task->estimation * 2]))
              @php $event = $task->project->name === 'Indisp.' ? 4 : 1 @endphp
              <li class="cd-schedule__event">
                <a data-start="{{ $hours[$task->start_hour] }}"
                   data-end="{{ $hours[$task->start_hour + $task->estimation * 2] }}"
                   data-title="{{ $task->title }}"
                   data-estimation="{{ $task->estimation }}"
                   data-effort="{{ $efforts[$task->effort] ?? null }}"
                   data-card="{{ $task->url }}"
                   data-edit="{{ $task->link }}/edit"
                   data-event="event-{{$event}}"
                   href="#0">
                  <em class="cd-schedule__name">{{ $task->project->client->name  }} | {{ $task->project->name }}</em>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>

      <li class="cd-schedule__group">
        <div class="cd-schedule__top-info"><span>Mardi {{ $week[1]->format('d/m/Y') }}</span></div>

        <ul>
          @foreach($resource->tasks->where('start_date', $week[1]->format('Y-m-d')) as $task)
            @if(isset($hours[$task->start_hour]) && isset($hours[$task->start_hour + $task->estimation * 2]))
              @php $event = $task->project->name === 'Indisp.' ? 4 : 1 @endphp
              <li class="cd-schedule__event">
                <a data-start="{{ $hours[$task->start_hour] }}"
                   data-end="{{ $hours[$task->start_hour + $task->estimation * 2] }}"
                   data-title="{{ $task->title }}"
                   data-estimation="{{ $task->estimation }}"
                   data-effort="{{ $efforts[$task->effort] ?? null }}"
                   data-card="{{ $task->url }}"
                   data-edit="{{ $task->link }}/edit"
                   data-event="event-{{ $event }}"
                   href="#0">
                  <em class="cd-schedule__name">{{ $task->project->client->name  }} | {{ $task->project->name }}</em>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>

      <li class="cd-schedule__group">
        <div class="cd-schedule__top-info"><span>Mercredi {{ $week[2]->format('d/m/Y') }}</span></div>

        <ul>
          @foreach($resource->tasks->where('start_date', $week[2]->format('Y-m-d')) as $task)
            @if(isset($hours[$task->start_hour]) && isset($hours[$task->start_hour + $task->estimation * 2]))
              @php $event = $task->project->name === 'Indisp.' ? 4 : 1 @endphp
              <li class="cd-schedule__event">
                <a data-start="{{ $hours[$task->start_hour] }}"
                   data-end="{{ $hours[$task->start_hour + $task->estimation * 2] }}"
                   data-title="{{ $task->title }}"
                   data-estimation="{{ $task->estimation }}"
                   data-effort="{{ $efforts[$task->effort] ?? null }}"
                   data-card="{{ $task->url }}"
                   data-edit="{{ $task->link }}/edit"
                   data-event="event-{{ $event }}"
                   href="#0">
                  <em class="cd-schedule__name">{{ $task->project->client->name  }} | {{ $task->project->name }}</em>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>

      <li class="cd-schedule__group">
        <div class="cd-schedule__top-info"><span>Jeudi {{ $week[3]->format('d/m/Y') }}</span></div>

        <ul>
          @foreach($resource->tasks->where('start_date', $week[3]->format('Y-m-d')) as $task)
            @if(isset($hours[$task->start_hour]) && isset($hours[$task->start_hour + $task->estimation * 2]))
              @php $event = $task->project->name === 'Indisp.' ? 4 : 1 @endphp
              <li class="cd-schedule__event">
                <a data-start="{{ $hours[$task->start_hour] }}"
                   data-end="{{ $hours[$task->start_hour + $task->estimation * 2] }}"
                   data-title="{{ $task->title }}"
                   data-estimation="{{ $task->estimation }}"
                   data-effort="{{ $efforts[$task->effort] ?? null }}"
                   data-card="{{ $task->url }}"
                   data-edit="{{ $task->link }}/edit"
                   data-event="event-{{ $event }}"
                   href="#0">
                  <em class="cd-schedule__name">{{ $task->project->client->name  }} | {{ $task->project->name }}</em>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>

      <li class="cd-schedule__group">
        <div class="cd-schedule__top-info"><span>Vendredi {{ $week[4]->format('d/m/Y') }}</span></div>

        <ul>
          @foreach($resource->tasks->where('start_date', $week[4]->format('Y-m-d')) as $task)
            @if(isset($hours[$task->start_hour]) && isset($hours[$task->start_hour + $task->estimation * 2]))
              @php $event = $task->project->name === 'Indisp.' ? 4 : 1 @endphp
              <li class="cd-schedule__event">
                <a data-start="{{ $hours[$task->start_hour] }}"
                   data-end="{{ $hours[$task->start_hour + $task->estimation * 2] }}"
                   data-title="{{ $task->title }}"
                   data-estimation="{{ $task->estimation }}"
                   data-effort="{{ $efforts[$task->effort] ?? null }}"
                   data-card="{{ $task->url }}"
                   data-edit="{{ $task->link }}/edit"
                   data-event="event-{{$event}}"
                   href="#0">
                  <em class="cd-schedule__name">{{ $task->project->client->name  }} | {{ $task->project->name }}</em>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </li>
    </ul>
  </div>

  <div class="cd-schedule-modal">
    <header class="cd-schedule-modal__header">
      <div class="cd-schedule-modal__content">
        <span class="cd-schedule-modal__date"></span>
        <h3 class="cd-schedule-modal__name"></h3>
      </div>

      <div class="cd-schedule-modal__header-bg"></div>
    </header>

    <div class="cd-schedule-modal__body">
      <div class="cd-schedule-modal__event-info"></div>
      <div class="cd-schedule-modal__body-bg"></div>
    </div>

    <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
  </div>

  <div class="cd-schedule__cover-layer"></div>
</div>
